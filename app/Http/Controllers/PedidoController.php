<?php

/**
 * LORENA MOYANO MONTES
 * PROYECTO FINAL PARA EL 
 * CFGS DESARROLLO DE APLICACIONES WEB
 * CURSO 2019-2020
 */

namespace App\Http\Controllers;

use App\Models\Carta;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{

    public function add(Request $request){
        $request->validate([
            'cantidad' => ['required', 'numeric']
        ]) ;
        $id = $request->input('id');
        $producto = Carta::where('id',$id)->first(); 

        $cantidad = $request->input('cantidad');
        $precio = $producto->precio;
        $total = $cantidad * $precio;
        Pedido::create([
            'idCliente' => Auth::user()->id,
            'idCarta' => $id,
            'cantidad' => $cantidad,
            'total' => $total,
        ]);
        return redirect()->route('ver',['id' => $id]) ;
    }

    public function carrito($id) {
        $carrito = DB::table('pedido')->join('cliente' , 'cliente.id' , '=' , 'pedido.idCliente')
                                      ->join('carta' , 'carta.id' , '=' , 'pedido.idCarta')
                                      ->select('cliente.*' , 'carta.*', 'pedido.*')
                                      ->where('idCliente' , '=' , $id)
                                      ->get();
        return view('carta.carrito' , ['carrito' => $carrito]);
        
    }

    public function borrar($id) {
        $user = Auth::user()->id;
        $pedido = Pedido::where('id' , $id);
        $pedido->delete();
        return redirect()->route('carrito' , $user);
    }

    public function pagar($id) {
        $user = Auth::user()->id;
        $pedido = DB::table('pedido')->join('cliente' , 'cliente.id' , '=' , 'pedido.idCliente')
                                      ->join('carta' , 'carta.id' , '=' , 'pedido.idCarta')
                                      ->select('cliente.*' , 'carta.*', 'pedido.*')
                                      ->where('idCliente' , '=' , $id)
                                      ->get();
        //dd($pedido);
        return view('carta.pagar' , ['id' => $id , 'pedido' => $pedido]);
    }

}