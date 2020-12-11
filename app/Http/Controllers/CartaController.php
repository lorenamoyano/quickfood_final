<?php

/**
 * LORENA MOYANO MONTES
 * PROYECTO FINAL PARA EL 
 * CFGS DESARROLLO DE APLICACIONES WEB
 * CURSO 2019-2020
 */

namespace App\Http\Controllers;

use App\Models\Carta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class CartaController extends Controller
{

    /**
     * View all the menu in the database
     * 
     * @param 
     * @return view carta
     */
    public function ver()
    {
        $data = DB::table('carta')->orderBy('id')->paginate(8);
        //dd($carta);
        return view('carta.carta', ['data' => $data])->render();
    }

    /**
     * View the allergens from a specific product
     * 
     * @param 
     * @return view carta
     */

    public function alergenos($id) {
        $id = $id;
        $nombre = DB::table('carta')->select('carta.nombre')->where('id' , '=' , $id)->first();

        $alergenos = DB::table('alergenos')->join('alergenos_carta' ,  'alergenos.id' , '=' , 'alergenos_carta.idAlergeno')
                                          ->join('carta' , 'carta.id' , '=' , 'alergenos_carta.idCarta')
                                          ->select('alergenos.nombre' , 'alergenos.imagen')
                                          ->where('idCarta' , '=' , $id)
                                          ->get();
        return view('carta.tabla_alergenos' , ['alergenos' => $alergenos , 'nombre' => $nombre]);
    }

    /**
     * View the search's result
     * 
     * @param req product's name, product's price, product's description
     * @return view carta
     */

    function card_data(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('carta')->paginate(8);
            return view('carta.pagination_card', ['data' => $data])->render();
        }
    }
}