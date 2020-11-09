@extends('layouts.app')

@section('content')


@if (Auth::user() && Auth::user()->perfil=="admin")
<a href="{{ route('anadir') }}" class="btn btn-primary">Añadir elemento a la carta</a>

<div class="container" id="contenedor">
</div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <!-- BUSCADOR -->
        <div class="form-group">
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <!--<div class="form-group">
            <input type="text" id="search2" class="form-control" placeholder="Buscar productos" />
        </div>-->
        <br>


        <div>
            <div class="container">
                <div class="row">

                    @foreach($carta as $carta)
                    <input type="hidden" value="{{ $carta -> id }}">
                    <div class="card" style="width: 15em;">
                        <img src="" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title text-truncate ">{{ $carta->nombre }}</h5>
                            <p class="card-text">{{ $carta->descripcion }}</p>
                            <p class="card-text">{{number_format ($carta->precio,2) }}€</p>
                            @if(Auth::user() && Auth::user()->perfil=="admin")
                                <a href="" class="btn btn-primary">Editar</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
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

@else

<div class="container" id="contenedor">
</div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <!-- BUSCADOR -->
        <div class="form-group">
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <!--<div class="form-group">
            <input type="text" id="search2" class="form-control" placeholder="Buscar productos" />
        </div>-->
        <br>


        <div>
            <div class="container">
                <div class="row">

                    @foreach($carta as $carta)
                    <input type="hidden" value="{{ $carta -> id }}">
                    <div class="card" style="width: 15em;">
                        <img src="" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title text-truncate ">{{ $carta->nombre }}</h5>
                            <p class="card-text">{{ $carta->descripcion }}</p>
                            <p class="card-text">{{number_format ($carta->precio,2) }}€</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
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
@endif
@endsection