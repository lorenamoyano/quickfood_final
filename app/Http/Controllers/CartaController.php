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

    public function product_show (Request $id) {
        $producto = Carta::find($id);

        return view('carta.product' , ['producto' => $producto]);
    }

    public function cesta(Request $id) {
        $user = Auth::user();
        $producto = Carta::find($id);
        return view ('carta.cesta' , ['producto' => $producto]);
    }
}