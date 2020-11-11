@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Bienvenido a QuickFood</h1>
            <h3>¿Qué desea?</h3>

            <a href="{{route('ver')}}">Pedir</a>
            <a href="">Mis pedidos</a>
            <button class="switch" id="switch" onclick="darkLight()">
                <span><i class="fas fa-sun"></i></span>
                <span><i class="fas fa-moon"></i></span>
            </button>
        </div>
    </div>
</div>


@endsection