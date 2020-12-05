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
use App\Models\Compra;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PedidoController extends Controller
{

    /*public function add(Request $request){
        $request->validate([
            'cantidad' => ['required', 'numeric'],
            'fecha' => ['required' , 'date']
        ]) ;
        $id = $request->input('id');
        $cantidad = $request->input('cantidad');
        $fecha = $request->input('fecha');
        Pedido::create([
            'idCliente' => Auth::user()->id,
            'idCar' => $id,
            'cantidad' => $cantidad,
            'fecha' => $fecha,
        ]);
        return redirect()->route('ver',['id' => $id]) ;
    }*/

    public function add(Request $request){
        $request->validate([
            'cantidad' => ['required', 'numeric'],
            'fecha' => ['required' , 'date']
        ]) ;
        $id = $request->input('id');
        $cantidad = $request->input('cantidad');
        $fecha = $request->input('fecha');
        $pedido = Pedido::select('idCliente', 'idCar' , 'id', 'cantidad')
            ->where('idCliente' , '=' , Auth::user()->id)
            ->where('idCar' , '=' , $id)
            ->where('pago' , '=' , '0')
            ->first();
        if(!$pedido){
            Pedido::create([
                'idCliente' => Auth::user()->id,
                'idCar' => $id,
                'cantidad' => $cantidad,
                'fecha' => $fecha,
            ]);
            
        } else {
        $pedido->cantidad += $request->input('cantidad');
        $pedido->update();
        }
        return redirect()->route('ver',['id' => $id]) ;
        
    }

    /*public function add(Request $request){
        $request->validate([
            'cantidad' => ['required', 'numeric']
        ]) ;
        $id = $request->input('id');
        
        $pedido1 = Pedido::create([
            'idCliente' => Auth::user()->id,
        ]);
        $idPedido = DB::table('pedido')->latest('id')->first();
        $pedido2 = PedidoCarta::create([
            'idPedido' => $idPedido->id,
            'idCarta' => $id,
        ]);
        $carta = DB::table('carta')->get();
        return view('carta.carta' , ['carta' => $carta]);
    }*/



    public function carrito($id) {
        $carrito = DB::table('pedido')->join('cliente' , 'cliente.id' , '=' , 'pedido.idCliente')
                                      ->join('carta' , 'carta.id' , '=' , 'pedido.idCar')
                                      ->select('cliente.*' , 'carta.*', 'pedido.*')
                                      ->where('idCliente' , '=' , $id)->where('pedido.pago' , '=' , 0)
                                      ->get();
        return view('carta.carrito' , ['carrito' => $carrito]);
        
    }

    /*public function carrito($id) {
        $carrito = DB::table('pedido')->join('cliente' , 'cliente.id' , '=' , 'pedido.idCliente')
                                      ->join('pedido_carta' , 'pedido_carta.idPedido' , '=' , 'pedido.id')
                                      ->join('carta' , 'carta.id' , '=' , 'pedido_carta.idCarta')
                                      ->select('cliente.*' , 'carta.*', 'pedido.*' , 'pedido_carta.*')
                                      ->where('idCliente' , '=' , $id)
                                      ->get();
        return view('carta.carrito' , ['carrito' => $carrito]);
        
    }*/

    public function borrar($id) {
        $user = Auth::user()->id;
        $pedido = Pedido::where('id' , $id);
        $pedido->delete();
        return redirect()->route('pedido.pagar' , $user);
    }

    /*public function borrar($id) {
        $user = Auth::user()->id;
        $pedido = Pedidocarta::select('pedido_carta.idPedido')
        ->join('pedido' , 'pedido.id' , '=' , 'pedido_carta.idPedido')
        ->join('carta' , 'carta.id' , '=' , 'pedido_carta.idCarta')
        ->where('pedido_carta.id', '=' , $id)->get();
        //dd($pedido);
        //$idPedido = DB::table('pedido_carta')->select('pedido_carta.idPedido')->first($pedido);
        //$idPedido = DB::table('pedido_carta')->select('pedido_carta.idPedido')->where('idPedido' , '=' , '')->first($pedido);
        $idPedido = DB::table('pedido_carta')->select('pedido_carta.idPedido')->get($pedido);
        dd($idPedido);
        $borrar = Pedido::where('pedido.id', '=' , $idPedido->idPedido);
        dd($borrar);
        //$borrar->delete();
        return redirect()->route('carrito' , $user);
    }*/

    public function pagar($id) {
        $user = Auth::user()->id;
        $pedido = DB::table('pedido')->join('cliente' , 'cliente.id' , '=' , 'pedido.idCliente')
                                      ->join('carta' , 'carta.id' , '=' , 'pedido.idCar')
                                      ->select('cliente.*' , 'carta.*', 'pedido.*')
                                      ->where('idCliente' , '=' , $id)
                                      ->where('pedido.pago' , '=' , '0')
                                      ->get();
        //dd($pedido);
        return view('carta.pagar' , ['id' => $id , 'pedido' => $pedido]);
    }

    /*public function historial ($id) {
        $id = Auth::user()->id; //idusuario
        $historial = DB::table('pedido')->join('cliente' , 'cliente.id' , '=' , 'pedido.idCliente')
                                      ->join('pedido_carta' , 'pedido_carta.idPedido' , '=' , 'pedido.id')
                                      ->join('carta' , 'carta.id' , '=' , 'pedido_carta.idCarta')
                                      ->select('carta.nombre', 'pedido.created_at')
                                      ->where('idCliente' , '=' , $id)
                                      ->orderBy('pedido.created_at' , 'desc')
                                      ->get()
                                      ->groupBy(function($date) {
                                        return Carbon::parse($date->created_at)->format('d-m-Y');
                                    });
                                      
        //dd($historial);
        return view ('users.historial' , ['historial' => $historial]);
    }*/

    public function historial($fecha) {
        $id = Auth::user()->id;
        $historial = DB::table('pedido')->join('carta' , 'carta.id' , '=' , 'pedido.idCar')
                                        ->select('pedido.fecha' , 'carta.precio', 'carta.nombre' , 'pedido.cantidad' , 'pedido.pago')
                                        ->where('idCliente' , '=' , $id)
                                        ->where('pago' , '=' , '1')
                                        ->get();
        return view ('users.historial' , ['historial' => $historial]);
    }


    public function pagado(Request $request) {
        $id = Auth::user()->id;
        $request->validate([
            'direccion' => ['required' , 'string']
        ]) ;
        $direccion = $request->input('direccion');
        $comprar = Compra::create([
                'idClien' => $id,
                'direccion' => $direccion,
            ]);
        $pagado = DB::table('pedido')->select('pago')
                                    ->where('idCliente' , '=' , $id)
                                    ->where('pago' , '=' , '0')
                                    ->update(['pago' => '1']);

        
        return redirect()->route('ver',['id' => $id]) ;
    }


    public function ver_reparto() {
        $id = Auth::user()->id;
        $reparto = DB::table('compra')->join('cliente' , 'cliente.id' , '=' , 'compra.idClien')
                                      ->select('repartido' , 'cliente.nombre' , 'compra.idClien' , 'compra.id' , 'compra.direccion' , 'cliente.telefono')
                                      ->where('repartido' , '=' , '0')
                                      ->get();
        return view('users.ver_reparto',['reparto' => $reparto]);
    }

    public function repartido(Request $request) {
        $request->validate([
            'id' => ['required' , 'integer'],
            'repartido' => ['required' , 'boolean']
        ]) ;

        $id = $request->input('id');
        $repartido = $request->input('repartido');
        $repartido = DB::table('compra')->where('id' , $id)->update(['repartido' => '1']);
        $reparto = DB::table('compra')->join('cliente' , 'cliente.id' , '=' , 'compra.idClien')
                                      ->select('repartido' , 'cliente.nombre' , 'compra.id' , 'compra.direccion' , 'cliente.telefono', 'compra.idClien')
                                      ->where('repartido' , '=' , '0')
                                      ->get();
        return view('users.ver_reparto',['reparto' => $reparto]);
    }

}