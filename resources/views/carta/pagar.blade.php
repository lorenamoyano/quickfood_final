@extends('layouts.app')

@section('content')

<div class="container" id="contenedor">
</div>
<div class="row justify-content-center">
    <div>
        <div>
            <div class="container">

                <h1>Aquí está tu cesta el detalle de tu compra, {{Auth::user()->nombre}}</h1>
                <table>
                    <div style="display: none;">{{ $total = 0 }}</div>
                    <tr>
                        <td>Nombre</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                    </tr>
                    @foreach($pedido as $pedido)
                    <tr>

                        <td>{{$pedido->nombre}}</td>
                        <td>{{$pedido->cantidad}}</td>
                        <td>{{number_format ($pedido->precio,2)}}€</td>
                        <td>{{number_format ($pedido->total,2)}}€</td>

                        <td></td>

                        <div style="display: none">{{ ($total += $pedido->total)}}</div>
                    </tr>
                    @endforeach
                    <tr>
                        <td>Reparto: 1€</td>
                    </tr>
                    <tr>
                        <td>
                            Total factura: {{number_format ($total+1,2)}}€
                        </td>
                    </tr>
                </table>
                <a href="#" id="show">Pagar</a>
                <div id="element" style="display: none;">
                    <div id="close"><a href="#" id="hide">cerrar</a></div>
                    <form method="post" action="">
                        <hr>
                        Datos personales:<br>
                        Nombre:<br />
                        <input type="text" id="name" name="name" size="40" value="{{Auth::user()->nombre}}"/><br />
                        Dirección:<br />
                        <input type="text" name="direccion" id="direccion" rows="6" cols="40"></textarea>
                        <br />
                        Teléfono:<br />
                        <input type="text" id="telefono" name="telefono" size="40" value="{{Auth::user()->telefono}}"/>
                        <hr>
                        Datos de pago:<br>
                        Número de la tarjeta:<br>
                        <input type="text" min="0" max="16"><br>
                        Fecha de caducidad:<br>
                        Mes: <input type="number" min="1" max="12"><br>
                        Año: <input type="number" min="2020" max="2030"><br>
                        CVC: <input type="number" maxlength="3">
                        <div style="margin-left: 376px;"><input name="submit" type="submit" value="Pagar" id="enviar-btn" /></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#hide").click(function() {
            $("#element").hide();
        });
        $("#show").click(function() {
            $("#element").show();
        });
    });
</script>


@endsection