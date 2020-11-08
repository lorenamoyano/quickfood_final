<?php

/**
 * LORENA MOYANO MONTES
 * PROYECTO FINAL PARA EL 
 * CFGS DESARROLLO DE APLICACIONES WEB
 * CURSO 2019-2020
 */

namespace App\Http\Controllers;

use App\Models\Carta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartaController extends Controller
{

    /**
     * FUNCIÓN QUE MUESTRA TODA LA CARTA DEL RESTAURANTE
     */
    public function ver()
    {
        $carta = DB::table('carta')->simplePaginate(5);
        return view('carta.carta', ['carta' => $carta]);
    }

    /**
     * BUSCADOR DE LA CARTA
     */
    /*public function buscar($search = null)
    {
        if (empty($search)) {
            $carta = Carta::orderBy('nombre')->simplePaginate(5);
        } else {
            $carta = Carta::orderBy('nombre')->where("nombre", 'LIKE', '%' . $search . '%')->simplePaginate(5);
        }
        return view('carta.carta', [
            'carta' => $carta
        ]);
    }*/

    //BUSCADOR

    public function search1(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('carta')
                    ->where('nombre', 'like', '%' . $query . '%')
                    ->orderBy('id', 'asc')
                    ->get();
            } else {
                $data = DB::table('carta')
                    ->orderBy('id', 'asc')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
        <tr>
         <td>' . $row->nombre . '</td>
         <td>' . number_format($row->precio, 2) . '€' . '</td>
         <td>' . $row->descripcion . '</td>
        </tr>
        ';
                }
            } else {
                $output = '
       <tr>
        <td align="center" colspan="5">Sin resultados.</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,

            );

            echo json_encode($data);
        }
    }

}
