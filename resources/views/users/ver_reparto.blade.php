@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <table class="col-md-12">
            <thead>
                <tr>
                    <th>Número de pedido</th>
                    <th>Nombre cliente</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Status pedido</th>
                </tr>
            </thead>
            <tbody>
                <form method="POST" action="{{ route('repartido') }}">
                    @csrf
                    <!-- si no se pone da un error de que la página ha expirado -->
                    <input id="id" type="hidden" name="id" value="" />
                    <input id="repartido" type="hidden" name="repartido" value="" />
                </form>

                @foreach($reparto as $repartos)
                <tr>

                    <td> {{ $repartos->id }} </td>
                    <td> {{ $repartos->nombre }}</td>
                    <td> {{ $repartos->direccion}} </td>
                    <td> {{ $repartos->telefono }} </td>
                    <td>
                        <select class="custom-select" id="{{ $repartos->id }}" data-id="{{ $repartos->id }}">
                            <option value="0" @if( $repartos->repartido == "0") selected @endif > No entregado </option>
                            <option value="1" @if( $repartos->repartido == "1") selected @endif > Entregado </option>
                        </select>
                    </td>
                </tr>

                @endforeach
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('select').change(function(e) {
            var id = $(e.target).data('id');
            var profile = '#' + id.toString() + " option:selected";
            $('#repartido').val($(profile).val());
            $('#id').val(id);
            $('form').submit();
        });
    });
</script>

@endsection