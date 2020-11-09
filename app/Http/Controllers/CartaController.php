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
        $carta = DB::table('carta')->get();
        return view('carta.carta', ['carta' => $carta]);
    }

    public function index()
    {
        $carta = DB::table('carta')->get();
        return view('carta.carta' , ['carta' => $carta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $res = DB::table('carta')
            ->where("nombre", "LIKE", "%{$request->term}%")
            ->get();

        return response()->json($res);
    }
}