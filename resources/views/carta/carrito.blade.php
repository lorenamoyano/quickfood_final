@extends('layouts.app')
@section('content')


<div class="col-xl-12 row justify-content-center">
    <div class="col-lg-8 col-xl-10 text-center">
        <h1>Aquí está tu pedido, {{Auth::user()->nombre}}</h1>
    </div>
    <div class="formulario">
        <table class="table-responsive">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
            @foreach($carrito as $carrito)
            <input type="hidden" value="{{$carrito->id}}" name="id" id="id">
            <tr>
                <td>{{$carrito->nombre}}</td>
                <td>{{$carrito->cantidad}}</td>
                <td>{{number_format($carrito->cantidad*$carrito->precio , 2)}}€</td>
                <td><a href="{{route('pedido.borrar',['id' => $carrito->id])}}"><i class="fa fa-trash" style="color:red"></i></a></td>
            </tr>
            @endforeach
        </table>
        <div>
            <a href="{{route('pedido.pagar',['id' => Auth::user()->id])}}" type="button" class="btn btn-success">
                Procesar el pedido
            </a>
        </div>
    </div>
</div>
@endsection