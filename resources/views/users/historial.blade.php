@extends('layouts.app')

@section('content')
@if (Auth::user()->perfil != "admin")

<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="container">
                <div class="row">
                    <form action="{{route('show_pedido')}}" method="post">
                        @csrf
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control datepicker" name="fecha">
                        </div>
                        <button type="submit" class="btn btn-default btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
        startDate: '-3d'
    });
</script>
@else
<div class="alert alert-danger col-sm-5 mx-auto">
    {{ ('Sección disponible solo para clientes') }}
</div>

@endif
@endsection