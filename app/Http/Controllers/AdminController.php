<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alergenos_carta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use App\Models\Carta;

class AdminController extends Controller
{
    /**
     * View all users in the database
     * 
     * @param 
     * @return view admin_panel
     */

    public function admin_panel()
    {
        $data = DB::table('cliente')->paginate(8);
        return view('users.admin_panel',  ['data' => $data]);
    }

    
    /**
     * Change the user's type
     * 
     * @param req user's id
     * @return view admin_panel
     */

    public function perfil(Request $id)
    {
        $tabla = DB::table('cliente')->where('id', $id->input('id'))->update(['perfil' => $id->input('perfil')]);
        //dd($tabla);
        $data = DB::table('cliente')->paginate(8);
        return view('users.admin_panel', ['data' => $data]);
    }

    /**
     * Delete an user in the database
     * 
     * @param req user's id
     * @return view panel admin
     */

    public function delete_user(Request $id)
    {
        DB::table('cliente')->where('id', $id->input('id'))->delete();
        $data = DB::table('cliente')->paginate(8);
        return view('users.admin_panel', ['data' => $data]);
    }


    /**
     * View product's add page
     * 
     * @param 
     * @return view product add
     */
    public function anadir()
    {
        $alergeno = DB::table('alergenos')->get();
        return view('carta.add_producto' , ['alergeno' => $alergeno]);
        //return view('carta.add_producto');
    }

    /**
     * Add a product to the database
     * 
     * @param req product's name, product's price, product's description
     * @return view all products
     */

    public function add_carta(Request $data)
    {
        $data->validate([
            'nombre' => ['required', 'string'],
            'precio' => ['required', 'numeric'],
            'descripcion' => ['required', 'string'],
            'alergeno' => ['required' , 'string'],
        ]);

        $nombre = $data->input('nombre');
        $precio = $data->input('precio');
        $descripcion = $data->input('descripcion');
        $alergeno = $data->input('alergeno');
        Carta::create([
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
        ]);
        $last = DB::table('carta')->select('id')->latest()->first();
        Alergenos_carta::create([
            'idCarta' => $last->id,
            'idAlergeno' => $alergeno,
        ]);
        return redirect()->route('ver');
    }


    /**
     * Delete a product to the database
     * 
     * @param id product
     * @return view all products
     */

    public function delete_product($id)
    {
        $producto = Carta::find($id);
        $producto->delete();

        return redirect()->route('ver');
    }

    /**
     * Edit an product in the database
     * 
     * @param req id
     * @return view edit product
     */

    public function view_edit($id)
    {
        $producto = Carta::find($id)->where("id", "LIKE", "$id")->get();
        return view('carta.edit_producto', ['producto' => $producto]);
    }

    /**
     * Edit a product in the database
     * 
     * @param req product's name, product's price, product's description
     * @return view all products
     */

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

    /**
     * View a chart with the user' shoppings
     * 
     * @param 
     * @return view admin chart
     */

    public function chartJS()
    {
        $record = DB::table('comprar')
            ->join('cliente', 'cliente.id', '=', 'comprar.idClien')
            ->select(DB::raw('count(*) as total'), 'cliente.nombre')
            ->groupBy('comprar.idClien', 'cliente.nombre')
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
