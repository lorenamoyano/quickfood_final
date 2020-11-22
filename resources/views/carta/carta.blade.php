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
                                    <h5 class="card-title text-truncate">{{ $carta->nombre }}</h5>
                                </tr>


                                <!-- Button trigger modal -->
                                <a type="button" data-toggle="modal" data-target="#myModal-{{ $carta->id }}">
                                    <i class="far fa-eye" style="color:blue;"></i>
                                </a>

                                <!-- Modal -->
                                <div data-backdrop="static" data-keyboard="false" class="modal fade" id="myModal-{{ $carta->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <a type="button" data-dismiss="modal"><i class="fas fa-arrow-left"></i></a>
                                                @if(Auth::user() && Auth::user()->perfil=="admin")
                                                <a href="{{route('product.update' , ['id' =>$carta->id])}}"><i class="fas fa-edit"></i></a>
                                                <a href=""></a>
                                                <!-- Button trigger modal -->
                                                <a data-toggle="modal" href="#myModal2" style="color:red"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                            @endif
                                            @if(Auth::user() && Auth::user()->perfil=="user")
                                            <a href="{{route('cesta' , ['id' =>$carta->id])}}" style="color:green"><i class="fas fa-shopping-basket"></i></a>
                                            @endif
                                            @if(!Auth::user())
                                            <a href="{{route('login')}}" style="color:green"><i class="fas fa-shopping-basket"></i></a>
                                            @endif

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
</div>
<!-- MODAL CONFIRMACIÓN -->
<div class="modal" id="myModal2" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- editar esto con css -->
                <h4 class="modal-title">Confirmación de eliminado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="container"></div>
            <div class="modal-body">
                ¿Desea eliminar el producto?
            </div>
            <div class="modal-footer">
                <a href="{{route('ver')}}" data-dismiss="modal" class="btn">No</a>
                <a href="{{route('product.delete' , ['id' =>$carta->id])}}" style="color:red"><i class="fas fa-trash-alt"></i></a>
            </div>
        </div>
    </div>
</div>
<br>

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