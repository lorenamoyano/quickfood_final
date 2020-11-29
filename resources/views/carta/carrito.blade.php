@extends('layouts.app')

@section('content')

<div class="container" id="contenedor">
</div>
<div class="row justify-content-center">
    <div>
        <div>
            <div class="container">
            

            <div style="display: none;">{{ $total = 0 }}</div> 
            
                
                
                {{$total}}
                <h1>Aquí está tu cesta de la compra, {{Auth::user()->nombre}}</h1>
                <table>
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
                    <a href="{{route('pedido.pagar',['id' => Auth::user()->id])}}" type="button" class="btn btn-success">
                        Pagar
                    </a>
                </div>

            </div>
            
        </div>
    </div>

</div>
@endsection