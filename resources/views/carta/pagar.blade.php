@extends('layouts.app')

@section('content')

<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="container">
                <div class="row">
                    <div id="invoice-POS">

                        <table>
                            <div style="display: none;">{{ $total = 0 }}</div>

                            <center id="top">
                                <div class="logo"></div>
                                <div class="info">
                                    <h2>El resumen de tu compra es el siguiente</h2>
                                </div>
                            </center>
                            <table>

                                <tr class="tabletitle">
                                    <th class="item">
                                        <h2 class="center">Producto</h2>
                                    </th>
                                    <th class="Hours">
                                        <h2 class="center">Cantidad</h2>
                                    </th>
                                    <th class="Rate">
                                        <h2 class="center">Precio</h2>
                                    </th>
                                    <th></th>
                                </tr>

                                @foreach($pedido as $pedidos)

                                <tr class="service">
                                    <td class="tableitem">
                                        <p class="itemtext">{{$pedidos->nombre}}</p>
                                    </td>
                                    <td class="tableitem">
                                        <p class="itemtext" id="center">{{$pedidos->cantidad}}</p>
                                    </td>
                                    <td class="tableitem">
                                        <p class="itemtext" id="center">{{number_format ($pedidos->precio*$pedidos->cantidad,2)}}€</p>
                                    </td>
                                    <td><a href="{{route('pedido.borrar',['id' => $pedidos->id])}}"><i class="far fa-trash-alt" style="color: black"></i></a></td>
                                </tr>
                                <div style="display: none">{{ ($total += $pedidos->precio*$pedidos->cantidad)}}</div>
                                @endforeach
                                @if($total > 0)
                                <tr>
                                    <td class="tableitem">
                                        <p class="itemtext">Reparto</p>
                                    </td>
                                    <td class="tableitem text-center"><i class="fas fa-times itemtext"></i></td>
                                    <td class="tableitem">
                                        <p class="itemtext" id="center">1.00€</p>
                                    </td>
                                </tr>

                                <tr class="tabletitle">

                                    <td class="Rate">
                                        <h2 class="pad">IVA</h2>
                                    </td>
                                    <td></td>
                                    <td class="payment">
                                        <h2 class="center1">{{number_format(($total)*0.21,2)}}€</h2>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr class="tabletitle">
                                    <td class="Rate">
                                        <h2 class="pad">Total</h2>
                                    </td>
                                    <td></td>
                                    <td class="payment">
                                        <h2 class="center1">{{number_format ($total+1,2)}}€</h2>
                                    </td>
                                    <td></td>
                                </tr>

                                @else
                                <br>
                                <tr class="tabletitle">
                                    <h2 class="text-center">Aún no has añadido nada al carrito</h2>
                                </tr>
                                @endif
                            </table>
                    </div>
                    <!--End Table-->
                    
                </div>
                <div class="col-3 mx-auto">
                    @if($pedido->count()>0)
            <a type="button" class="btn btn-primary mx-auto mt-2" data-toggle="modal" data-target="#exampleModal">
                Pagar
            </a>
            @endif
                    </div>
            </div>
            
            <div data-backdrop="static" data-keyboard="false" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Datos del pago</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="get" action="{{route('pagado')}}" name="form1" onsubmit="return validar_pago()" onsubmit="sonido()">
                                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>Nombre</label>
                                        <input type="text" id="nombre" class="form-control" value="{{(Auth::user()->nombre)}}" required onchange="quitarError('nombreHelp')">
                                        <small style="visibility: hidden;" id="nombreHelp" class="form-text text-danger">Campo obligatorio</small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Teléfono</label>
                                        <input type="text" id="telefono" class="form-control" value="{{(Auth::user()->telefono)}}" required onchange="quitarError('telefonoHelp')">
                                        <small style="visibility: hidden;" id="telefonoHelp" class="form-text text-danger">Campo numérico yobligatorio</small>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label>Dirección</label>
                                        <input type="text" id="direccion" class="form-control" placeholder="Dirección" required name="direccion" onchange="quitarError('direccionHelp')">
                                        <small style="visibility: hidden;" id="direccionHelp" class="form-text text-danger">Campo alfanumérico y obligatorio</small>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label>Número de la tarjeta</label>
                                        <input type="text" name='text1' id="num_card" class="form-control" placeholder="Número tarjeta" required onchange="quitarError('num_cardHelp')">
                                        <small style="visibility: hidden;" id="num_cardHelp" class="form-text text-danger">Campo obligatorio. Sólo acepta VISA</small>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <h5>Fecha de caducidad</h5>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>Mes</label>
                                        <input type="text" id="mes" class="form-control" placeholder="Mes" required onchange="quitarError('mesHelp')">
                                        <small style="visibility: hidden;" id="mesHelp" class="form-text text-danger">Campo numérico y obligatorio</small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Año</label>
                                        <input type="text" id="year" class="form-control" placeholder="Año" required onchange="quitarError('yearHelp')">
                                        <small style="visibility: hidden;" id="yearHelp" class="form-text text-danger">Campo numérico y obligatorio</small>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col-md-2 mx-auto">
                                        <label>CVV</label>
                                        <input type="text" id="cvv" class="form-control" placeholder="CVV" required onchange="quitarError('cvvHelp')">
                                        <small style="visibility: hidden;" id="cvvHelp" class="form-text text-danger">Campo numérico(3) y obligatorio</small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" id="Ingresar" class="btn btn-primary reproductor" style="color: white" onclick="sonido()"><audio id="audio" src="{{asset('sound/success.mp3')}}"></audio>Pagar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection