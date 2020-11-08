@extends('layouts.app')

@section('content')
@if(Auth::user() && Auth::user()->perfil == "admin")
<div class="container" id="contenedor">
</div>
<div id="result"></div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <br>

        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Ciudad</th>
                        <th>Perfil</th>
                        <th>Unido hace...</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <form method="POST" action="{{ route('perfil') }}">
                    @csrf <!-- si no se pone da un error de que la página ha expirado -->
                    <input id="id" type="hidden" name="id" value="" />
                    <input id="perfil" type="hidden" name="perfil" value="" />
                </form>

                    @foreach($user as $user)
                    <tr>

                        <td> {{ $user->nombre }} </td>
                        <td> {{ $user->apellido1 }} {{$user->apellido2}} </td>
                        <td> {{ $user->DNI }} </td>
                        <td> {{ $user->telefono }} </td>
                        <td> {{ $user->email }} </td>
                        <td> {{ $user->ciudad }} </td>
                        <td>
                            <select class="custom-select" id="{{ $user->id }}" data-id="{{ $user->id }}">
                                <option value="admin"> Administrador </option>
                                <option value="repartidor" @if( $user->perfil == "repartidor") selected @endif > Repartidor </option>
                                <option value="user" @if( $user->perfil == "user") selected @endif > Cliente </option>
                            </select>
                        </td>
                        <td>{{ $diff = Carbon\Carbon::parse($user->created_at)->diffForHumans(Carbon\Carbon::now()) }}</td>

                        <td><a href="{{ route('delete' , ['id' => $user->id]) }}"><i class="fa fa-trash" style="color:red"></i></a></td>
                    </tr>
                    @endforeach

            </table>
        </div>
        <br>
    </div>
</div>

</div>
</div>

<script>
    $(document).ready(function(){
	$('select').change(function(e){

		var id = $(e.target).data('id');
		var profile = '#' + id.toString() + " option:selected";
		$('#perfil').val($(profile).val());
        $('#id').val(id) ;

		$('form').submit() ;
    }) ;
    echo ("Hola");
});
</script>

@else
<div class="alert alert-danger">
    {{ ('No tienes permisos para ver esta página') }}
</div>
@endif

@endsection