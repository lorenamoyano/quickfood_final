<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    /**
     * View all the products
     * 
     * @param 
     * @return view json products
     */
    public function productos($api)
    {
        $api = $api;
        $api_search = DB::table('cliente')->select('api_token')->where('api_token', '=', $api)->first();
        if (!$api_search) {
            return view('home');
        } else {
            $carta = DB::table('carta')->get();
            return response()->json($carta);
        }
    }



    /**
     * View a product
     * 
     * @param id api
     * @return view json product
     */

    public function producto($id, $api)
    {
        $api = $api;
        $api_search = DB::table('cliente')->select('api_token')->where('api_token', '=', $api)->first();
        if (!$api_search) {
            return view('home');
        } else {
            $carta = DB::table('carta')->where('id', $id)->get();
            return response()->json($carta);
        }
    }

    /**
     * View all users in the database
     * 
     * @param api
     * @return view cliente json
     */

    public function usuarios($api)
    {
        $api = $api;
        $api_search = DB::table('cliente')->select('api_token' , 'perfil')
                                          ->where('api_token', '=', $api)
                                          ->where('perfil' , '=' , 'admin')
                                          ->first();
        if (!$api_search) {
            return view('home');
        } else {
            $cliente = DB::table('cliente')->get();
            return response()->json($cliente);
        }
    }

    /**
     * View an user in the database
     * 
     * @param id api
     * @return view json cliente
     */

    public function usuario($id , $api)
    {
        $usuario = Auth::user()->id;
        $api = $api;
        $api_search = DB::table('cliente')->select('api_token' , 'id')
                                          ->where('perfil' , '=' , 'admin')
                                          ->orWhere('id' , '=' , $id)
                                          ->orWhere('id' , '=' , $usuario)
                                          ->first();
        if (!$api_search) {
            return view('home');
        } else {
            $cliente = DB::table('cliente')->where('id' , '=' , $id)->get();
            return response()->json($cliente);
        }
    }
}
