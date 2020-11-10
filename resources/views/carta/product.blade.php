@extends('layouts.app')

@section('content')

<div class="container" id="contenedor">
</div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div>
            <div class="container">
                <div class="row">
                    @foreach($producto as $producto)
                        {{$producto->nombre}}<br>
                        {{$producto->descripcion}}<br>
                        {{number_format ($producto->precio,2) }}€<br>
                        
                    @endforeach
                </div>
            </div>
        </div>
        @if(Auth::user() && Auth::user()->perfil=="admin")
            <a href="" class="btn btn-primary">Editar</a>
            <a href="" class="btn btn-danger">Borrar</a>
        @endif
        @if(Auth::user() && Auth::user()->perfil=="user")
            <a href="" class="btn btn-success">Pedir</a>
        @endif
        <!-- PAGINACION -->

        <br>

    </div>

</div>

</div>
</div>


<script>
    $(document).ready(function() {
        $("#name").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{route('autocomplete')}}",
                    data: {
                        term: request.term
                    },
                    dataType: "json",
                    success: function(data) {
                        var resp = $.map(data, function(obj) {
                            return obj.nombre;
                        });

                        response(resp);
                    }
                });
            },
            minLength: 1
        });
    });
</script>
@endsection