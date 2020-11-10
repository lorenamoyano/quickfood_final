@extends('layouts.app')

@section('content')


@if (Auth::user() && Auth::user()->perfil=="admin")
<a href="{{ route('anadir') }}" class="btn btn-primary">Añadir elemento a la carta</a>
@endif
<div class="container" id="contenedor">
</div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <!-- BUSCADOR -->
        <div class="form-group">
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <br>

        <div>
            <div class="container">
                <div class="row">

                    @foreach($carta as $carta)
                    <input type="hidden" name="id" value="{{ $carta -> id }}">
                    <div class="card carta" style="width: 15em;">
                        <img src="" class="card-img-top" alt="">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <h5 class="card-title text-truncate ">{{ $carta->nombre }}</h5>
                                </tr>
                                <tr>
                                    <p class="card-text">{{ $carta->descripcion }}</p>
                                </tr>
                                <tr>
                                    <p class="card-text" id="sus">{{number_format ($carta->precio,2) }}€</p>
                                </tr>

                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{ $carta->id }}">
                                    Ver
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal-{{ $carta->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Producto</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>{{$carta->nombre}}</h5>
                                                <h6>{{$carta->descripcion}}</h6>
                                                <h6>{{number_format ($carta->precio,2) }}€</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-success">Pedir</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </table>
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
                        term: request.term,
                        url: "{{route('product' , ['id' => $carta ->id])}}"
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