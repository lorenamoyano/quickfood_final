@extends('layouts.app')

@section('content')


@if (Auth::user() && Auth::user()->perfil=="admin")
<a href="{{ route('anadir') }}" class="btn btn-primary">Añadir elemento a la carta</a>
@endif
<div class="container" id="contenedor">
</div>
<div class="row justify-content-center">
    <div>
        <div>
            <div class="container">
                <div class="row">

                    @foreach($producto as $producto)
                    <input type="hidden" name="id" value="{{ $producto -> id }}">
                    <form method="POST" action="{{ route('producto.add', ['id' => $producto->id]) }}">
                        @csrf
                        <div class="card-body">

                            <h1 class="card-title">{{ $producto->nombre }}</h1><br>
                            <h6 class="card-text">{{ $producto->descripcion }}</h6><br>
                            <h6 class="card-text">{{number_format ($producto->precio,2) }}€ /unidad</h6><br>
                            <label for="cantidad">¿Cuántas unidades desea?</label>
                            <input id="cantidad" type="number" class="form-control" name="cantidad" value="1" min="1">
                            <input type="hidden" name="fecha" value="{{ $diff = Carbon\Carbon::parse(Carbon\Carbon::now()->toDateString())}}" />
                            
                            <br>
                            <button type="submit" class="btn btn-success">Añadir cesta</button>

                        </div>
                    </form>

                    @endforeach

                </div>

            </div>
        </div>
    </div>

</div>
<script>
    function setInputDate(_id){
    var _dat = document.querySelector(_id);
    var hoy = new Date(),
        d = hoy.getDate(),
        m = hoy.getMonth()+1, 
        y = hoy.getFullYear(),
        data;

    if(d < 10){
        d = "0"+d;
    };
    if(m < 10){
        m = "0"+m;
    };

    data = y+"-"+m+"-"+d;
    console.log(data);
    _dat.value = data;
};

setInputDate("#dateDefault");
</script>
@endsection