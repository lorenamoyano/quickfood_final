<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use App\Models\Carta;

class AdminController extends Controller
{
    public function admin_panel()
    {
        $data = DB::table('cliente')->paginate(3);
        return view('users.admin_panel',  ['data' => $data]);
    }


    function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('cliente')
                ->where('id', 'like', '%' . $query . '%')
                ->orWhere('nombre', 'like', '%' . $query . '%')
                ->orWhere('ciudad', 'like', '%' . $query . '%')
                ->orWhere('apellido1', 'like', '%' . $query . '%')
                ->orWhere('apellido2', 'like', '%' . $query . '%')
                ->orWhere('telefono', 'like', '%' . $query . '%')
                ->orWhere('DNI', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%')
                ->orWhere('perfil', 'like', '%' . $query . '%')
                ->orderBy($sort_by, $sort_type)
                ->paginate(3);
            //dd($data);
            return view('users.pagination_data', ['data' => $data])->render();
        }
    }

    public function perfil(Request $id)
    {
        $tabla = DB::table('cliente')->where('id', $id->input('id'))->update(['perfil' => $id->input('perfil')]);
        //dd($tabla);
        $data = DB::table('cliente')->paginate(3);
        return view('users.admin_panel', ['data' => $data]);
    }


    public function delete_user(Request $id)
    {
        DB::table('cliente')->where('id', $id->input('id'))->delete();
        $data = DB::table('cliente')->paginate(3);
        return view('users.admin_panel', ['data' => $data]);
    }

    public function anadir()
    {
        return view('carta.add_producto');
    }

    public function add_carta(Request $data)
    {
        $data->validate([
            'nombre' => ['required', 'string'],
            'precio' => ['required', 'numeric'],
            'descripcion' => ['required', 'string'],
        ]);

        $nombre = $data->input('nombre');
        $precio = $data->input('precio');
        $descripcion = $data->input('descripcion');

        Carta::create([
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
        ]);
        return redirect()->route('ver');
    }

    public function delete_product($id)
    {
        $producto = Carta::find($id);
        $producto->delete();

        return redirect()->route('ver');
    }

    public function view_edit($id)
    {
        $producto = Carta::find($id)->where("id", "LIKE", "$id")->get();
        return view('carta.edit_producto', ['producto' => $producto]);
    }

    public function edit_product(Request $request)
    {
        //validación de los datos del formulario
        $validate = $this->validate($request, [
            'nombre' => ['required', 'string', 'max:250'],
            'precio' => ['required', 'string', 'max:5'],
            'descripcion' => ['required', 'string', 'max:250']
        ]);

        //recogida de los datos del formulario
        $producto = Carta::find($request)->where('id', $request->input('id'))->first();
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');

        $producto->save();
        return redirect()->route('ver');
    }

    public function chartJS()
    {
        $record = DB::table('compra')
            ->join('cliente', 'cliente.id', '=', 'compra.idClien')
            ->select(DB::raw('count(*) as total'), 'cliente.nombre')
            ->groupBy('compra.idClien', 'cliente.nombre')
            ->get();

        $data = [];

        foreach ($record as $row) {
            $data['label'][] = $row->nombre;
            $data['data'][] = (int) $row->total;
        }

        $data['chart_data'] = json_encode($data);
        return view('users.chartJS', $data);
    }
}
