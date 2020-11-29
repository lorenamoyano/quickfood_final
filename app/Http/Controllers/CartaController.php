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
     * FUNCIÓN QUE MUESTRA TODA LA CARTA DEL RESTAURANTE
     */
    public function ver()
    {
        $carta = DB::table('carta')->orderBy('id')/*->paginate(6)*/->get();
        //dd($carta);
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
        //$id = $request;
        
        $res = DB::table('carta')->select("id" , "nombre")
            ->where("nombre", "LIKE", "%{$request->term}%")
            ->get();

        return response()->json($res);
        
        /*([
            'res' => $res,
            'id' => $id
        ]);*/
    }

    public function product_show ($id) {
        $producto = Carta::find($id)->get();
        $producto = Carta::select('nombre' , 'precio' , 'descripcion')->where("id", "LIKE", "{$id}")->get();
        return view('carta.product' , ['producto' => $producto]);
    }

    public function cesta(Request $id) {
        $user = Auth::user();
        $producto = Carta::find($id);
        return view ('carta.cesta' , ['producto' => $producto]);
    }
}