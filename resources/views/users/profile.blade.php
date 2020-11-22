@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user() && Auth::user()->id == $user->id || Auth::user()->perfil == "admin")
            <div class="card">
                <div class="card-header">{{ __('Datos del perfil') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif



                    {{ __('Perfil') }}
                    <hr>
                    {{$user->nombre}}
                    {{$user->apellido1}}
                    {{$user->apellido2}}
                    <br>
                    {{$user->email}}
                    <br>
                    {{$user->ciudad}}
                    <br>
                    <strong>Tiempo con nosotros: </strong>
                    {{ $diff = Carbon\Carbon::parse($user['created_at'])->diffForHumans(Carbon\Carbon::now()) }}
                    <br>
                    <a href="{{ route('user.delete' , ['id' => $user->id]) }}"><i class="fa fa-trash" style="color:red" style="text-align: right;"></i></a>
                    @else
                    <div class="alert alert-danger">
                        {{ ('No tienes permisos para ver esta página') }}
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>


    <table><tr>
    <td></td>
    </tr></table>
<script>

</script>

@endsection