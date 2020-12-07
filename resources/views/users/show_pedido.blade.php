@extends('layouts.app')

@section('content')

@if (Auth::user()->perfil != "admin")
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="container">
                <div class="row">
                @if($show_pedido->count() > 0)
                    <div id="invoice-POS">
                        
                        <table>
                            <div style="display: none;">{{ $total = 0 }}</div>
                            <center id="top">
                                <div class="logo"></div>
                                <div class="info">
                                    <h2>Detalle del pedido</h2>
                                </div>
                            </center>
                            <tr class="tabletitle">
                                <th class="item">
                                    <h2 class="center">Fecha</h2>
                                </th>
                                <th class="item">
                                    <h2 class="center">Producto</h2>
                                </th>
                                <th class="item">
                                    <h2 class="center">Cantidad</h2>
                                </th>
                                <th class="item">
                                    <h2 class="center">Total</h2>
                                </th>
                            </tr>
                            @foreach($show_pedido as $historial_user)
                            <tr class="service">
                                <td class="tableitem">
                                    <p class="itemtext" id="center">{{date('d-m-Y', strtotime($historial_user->fecha))}}</p>
                                    
                                </td>
                                <td class="tableitem">
                                    <p class="itemtext">{{$historial_user->nombre}}</p>
                                </td>
                                <td class="tableitem">
                                    <p class="itemtext" id="center">{{$historial_user->cantidad}}</p>
                                </td>
                                <td class="tableitem">
                                    <p class="itemtext" id="center">{{number_format($historial_user->cantidad * $historial_user->precio,2)}}€</p>
                                </td>
                            </tr>
                            <div style="display: none">{{ ($total += $historial_user->cantidad * $historial_user->precio)}}</div>
                            @endforeach
                            <tr class="service">
                                <td class="tableitem">
                                    <p class="itemtext" id="center">{{date('d-m-Y', strtotime($historial_user->fecha))}}</p>
                                </td>
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
                                    <h2 class="pad" id="center">IVA</h2>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="payment">
                                    <h2 class="center1">{{number_format(($total)*0.21,2)}}€</h2>
                                </td>

                            </tr>
                            <tr class="tabletitle">
                                <td class="Rate">
                                    <h2 class="pad" id="center">Total</h2>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="payment">
                                    <h2 class="center1">{{number_format ($total+1,2)}}€</h2>
                                </td>

                            </tr>
                        </table>
                        @else
                        <div class="alert alert-danger col-sm-5 mx-auto">
                            {{ ('No tienes ningún pedido este día') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="alert alert-danger col-sm-5 mx-auto">
    {{ ('Sección disponible solo para clientes') }}
</div>
@endif
@endsection