@extends('layouts.app')

@section('content')

<div class="container" id="contenedor">
</div>
<div class="row justify-content-center">
    <div>
        <div>
            <div class="container">
                <h1>Aquí está tu cesta de la compra, {{Auth::user()->nombre}}</h1>
                <table>
                    <tr>
                        <div style="display: none;">{{ $total = 0 }}</div>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>

                    </tr>
                    @foreach($carrito as $carrito)
                    <tr>
                        <td>{{$carrito->nombre}}</td>
                        <td>{{$carrito->cantidad}}</td>
                        <td>{{number_format ($carrito->total,2) }}€</td>
                        <td><a href="{{route('pedido.borrar',['id' => $carrito->id])}}"><i class="fa fa-trash" style="color:red"></i></a></td>

                    </tr>
                    <div style="display: none">{{ ($total += $carrito->total)}}</div>
                    <tr>

                    </tr>

                    @endforeach
                    <tr>
                        <td><strong>TOTAL</strong></td>
                        <td></td>
                        <td><strong>{{number_format ($total,2)}}€</strong></td>
                    </tr>

                </table>
                <div>
                    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Pagar
                    </a>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Forma de recogida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¡Hola, {{Auth::user()->nombre}}!</p><br>
                <p>Nos alegra muchísimo que cuentes una vez más con nosotros. Sólo nos queda una última 
                cosa antes de proceder con el pago.</p><br>
                <p>¿Quieres recibir el pedido en casa <strong>(gasto extra de 1€)</strong> 
                o quieres venir a recogerlo en el local?</p>
            </div>
            <div class="modal-footer">
                <a href="" type="button" class="btn btn-primary" data-dismiss="modal">Recogida en local</a>
                <a href="" type="button" class="btn btn-primary">Reparto a domicilio</a>
            </div>
        </div>
    </div>
</div>

@endsection