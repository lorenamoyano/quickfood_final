@extends('layouts.app')

@section('content')

<div class="parent3">
    <div class="div10"></div>
    <div class="div20">
        <h1>QuickFood</h1><br>
        <p>Siéntete como en casa, come como en casa</p>
    </div>
    <div class="div30"><a href="{{route('contacto')}}">Visítanos</a></div>
</div>

<div class="main-text">
    <h1>Historia de QuickFood</h1>
    <p><i>QuickFood</i> nació de la mano de dos personas. Una de ellas se encargó del nombre de la empresa,
        la otra pensó en la idea para ponerlo todo en marcha.</p>
    <p>Desde ese momento han pasado unos años. Para nosotros parece que fue ayer cuando todo eran ideas locas,
        sin embargo, aquí estamos con vosotros y vosotros con nosotros. Todos somos una gran familia.
    </p>
    <p>En <i>QuickFood</i> queremos que te sientas como parte de la nuestra, por eso hemos preparado unos productos
        que estamos seguros que serán de tu agrado. No dudes en ir a la sección de <i><strong>Carta</strong></i>
        para elegir el plato que más te guste.
    </p>
    <p>Por todos estos años y todos los venideros: ¡muchísimas gracias!</p>
    <br>
    <p class="derecha"><strong>Equipo de QuickFood</strong></p>
</div>


@endsection