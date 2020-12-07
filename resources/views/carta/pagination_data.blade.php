@if (Auth::user() && Auth::user()->perfil=="admin")
<a href="{{ route('anadir') }}" class="btn btn-success"><i class="fas fa-plus-square"></i> Añadir</a>
@endif
<div class="container" id="contenedor"></div>
<br>

<div class="restaurant-grid mx-auto" id="table_data">
    @foreach($data as $cartas)
    <div class="restaurant-grid__item">
        <div class="card">
            <img src="img/food.jpg" class="card__img">
            <div class="card__info">
                <div class="card__title">
                    {{$cartas->nombre}}
                </div>
            </div>

            <a type="button" data-toggle="modal" data-target="#myModal-{{ $cartas->id }}" class="button">
                <i class="far fa-eye" style="color:black;"></i>
            </a>
            <!-- Modal -->
            <div data-backdrop="static" data-keyboard="false" class="modal fade" id="myModal-{{ $cartas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>{{$cartas->nombre}}</h5>
                            <h6>{{$cartas->descripcion}}</h6>
                            <h6>{{number_format ($cartas->precio,2) }}€</h6>
                        </div>
                        <div class="modal-footer">
                            
                            @if(Auth::user() && Auth::user()->perfil=="admin")
                            <a type="button" data-dismiss="modal"><i class="fas fa-arrow-left"></i></a>
                            <a href="{{route('product.update' , ['id' =>$cartas->id])}}"><i class="fas fa-edit"></i></a>
                            <a href=""></a>
                            <!-- Button trigger modal -->
                            <a href="{{route('product.delete' , ['id' =>$cartas->id])}}" style="color:red"><i class="fas fa-trash-alt"></i></a>
                            @endif


                            @if(Auth::user() && Auth::user()->perfil=="user")
                            <form method="POST" action="{{ route('producto.add', ['id' => $cartas->id]) }}">
                            @csrf
                                <label for="cantidad">¿Cuántas unidades desea?</label>
                                <input class="cantidad col-sm-12 mb-2" type="number" class="form-control" name="cantidad" value="1" min="1">
                                <input type="hidden" name="fecha" value="{{ $diff = Carbon\Carbon::parse(Carbon\Carbon::now()->toDateString())}}" />
                                <button type="submit" class="btn btn-success col-sm-12">Añadir cesta</button>
                            </form>
                            <a type="button" data-dismiss="modal"><i class="fas fa-arrow-left"></i></a>
                            @endif
                            @if(!Auth::user())
                            <a type="button" data-dismiss="modal"><i class="fas fa-arrow-left"></i></a>
                            <a href="{{route('login')}}" style="color:green"><i class="fas fa-shopping-basket"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach

</div>
<div class="links">
    <div colspan="3" class="col-sm-12" style="margin-top: 2em;">
        {{ $data->links() }}
    </div>
</div>