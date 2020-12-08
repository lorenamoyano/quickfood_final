<?php

/**
 * LORENA MOYANO MONTES
 * PROYECTO FINAL PARA EL 
 * CFGS DESARROLLO DE APLICACIONES WEB
 * CURSO 2019-2020
 */

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{

    /**
     * Add a product to the shopping cart
     * 
     * @param req product's quantity, product's create date
     * @return view carta
     */
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


    /**
     * Delete a product from the shopping cart
     * 
     * @param id
     * @return view shopping cart
     */

    public function borrar($id) {
        $user = Auth::user()->id;
        $pedido = Pedido::where('id' , $id);
        $pedido->delete();
        return redirect()->route('pedido.pagar' , $user);
    }

    /**
     * Show user's order and the pay form
     * 
     * @param id
     * @return view carta
     */

    public function pagar($id) {
        $user = Auth::user()->id;
        $pedido = DB::table('pedido')->join('cliente' , 'cliente.id' , '=' , 'pedido.idCliente')
                                      ->join('carta' , 'carta.id' , '=' , 'pedido.idCar')
                                      ->select('cliente.*' , 'carta.*', 'pedido.*')
                                      ->where('idCliente' , '=' , $id)
                                      ->where('pedido.pago' , '=' , '0')
                                      ->get();
        return view('carta.pagar' , ['id' => $id , 'pedido' => $pedido]);
    }

    /**
     * View the order filter by date
     * 
     * @param req order's date
     * @return view show_pedido with the order
     */

    public function show_pedido(Request $request) {
        $fecha = $request->fecha;
        $id = Auth::user()->id;
        $show_pedido = DB::table('pedido')->join('carta' , 'carta.id' , '=' , 'pedido.idCar')
                                        ->select('pedido.fecha' , 'carta.precio', 'carta.nombre' , 'pedido.cantidad')
                                        ->where('idCliente' , '=' , $id)
                                        ->where('pago' , '=' , '1')
                                        ->where('pedido.fecha' , '=' , $fecha)
                                        ->get();

        
        $precio_reparto = DB::table('compra')->where('idClien' , '=' , $id)
                                            ->where('repartido' , '=' , '1')
                                            ->whereDate('created_at' , '=' , $fecha)
                                            ->count();

        return view ('users.show_pedido' , ['show_pedido' => $show_pedido , 'fecha' => $fecha , 'precio_reparto' => $precio_reparto]);
    }


    /**
     * User pay form and update the database's column for pay
     * 
     * @param req user's address
     * @return view carta
     */

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

    /**
     * View all the orders that have not yet been delivered
     * 
     * @param 
     * @return view ver_reparto
     */

    public function ver_reparto() {
        $id = Auth::user()->id;
        $reparto = DB::table('compra')->join('cliente' , 'cliente.id' , '=' , 'compra.idClien')
                                      ->select('repartido' , 'cliente.nombre' , 'compra.idClien' , 'compra.id' , 'compra.direccion' , 'cliente.telefono')
                                      ->where('repartido' , '=' , '0')
                                      ->get();
        return view('users.ver_reparto',['reparto' => $reparto]);
    }

    /**
     * Change the database's column "repartido" from false to true
     * 
     * @param req compra.id , compra.repartido
     * @return view ver_reparto
     */

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