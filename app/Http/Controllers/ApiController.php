<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Carta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends Controller
{

    /**
     * View all the products
     * 
     * @param 
     * @return view json products
     */

    public function product(){
        $carta = DB::table('carta')->get();
        return response()->json($carta);
    }

    /**
     * View a product
     * 
     * @param id
     * @return view json product
     */

    public function producto($id){
        $carta = DB::table('carta')->where('id', $id)->get();
        return response()->json($carta);
    }

    /**
     * View all users in the database
     * 
     * @param 
     * @return view cliente json
     */

    public function usuarios(){
        $cliente = DB::table('cliente')->get();
        return response()->json($cliente);
    }

    /**
     * View an user in the database
     * 
     * @param id
     * @return view json cliente
     */

    public function usuario($id){
        $cliente = DB::table('cliente')->where('id', $id)->get();
        return response()->json($cliente);
    }
}
