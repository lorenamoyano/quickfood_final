@extends('layouts.app')

@section('content')

<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="container">
                <div class="row">
                    <table>
                        <tr>
                            <th>Pedido efectuado el día</th>
                            <th>Nombre del producto</th>
                            <th>Estado del pago</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                        @foreach($historial as $historial_user)
                        <tr>
                            <td>{{$historial_user->fecha}}</td>
                            <td>{{$historial_user->nombre}}</td>
                            <td>{{$historial_user->pago}}</td>
                            <td>{{$historial_user->cantidad}}</td>
                            <td>{{$historial_user->cantidad * $historial_user->precio}}€</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection