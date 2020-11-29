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
                    <a type="button" data-toggle="modal" data-target="#myModal-{{ $user->id }}">
                        <i class="fas fa-edit" style="color:blue" style="text-align: right;"></i>
                    </a>

                    <!-- Modal -->
                    <div data-backdrop="static" data-keyboard="false" class="modal fade" id="myModal-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input id="nombre" type="text" class="form-control @error('name') is-invalid @enderror" readonly name="nombre" value="{{ Auth::user()->nombre }}" required autocomplete="name" autofocus style="text-align: center;">
                                        <input id="apellido1" type="text" class="form-control @error('apellido1') is-invalid @enderror" readonly name="apellido1" value="{{ Auth::user()->apellido1 }}" required autocomplete="name" autofocus style="text-align: center;">
                                        <input id="apellido2" type="text" class="form-control @error('apellido2') is-invalid @enderror" readonly name="apellido2" value="{{ Auth::user()->apellido2 }}" required autocomplete="name" autofocus style="text-align: center;">
                                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ Auth::user()->telefono }}" required autocomplete="name" autofocus style="text-align: center;">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="name" autofocus style="text-align: center;">
                                        <input id="ciudad" type="text" class="form-control @error('ciudad') is-invalid @enderror" name="ciudad" value="{{ Auth::user()->ciudad }}" required autocomplete="name" autofocus style="text-align: center;">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    @if(Auth::user()->avatar)
                                                    <img src="{{ url('/user/avatar/'.Auth::user()->avatar) }}" class="avatar">
                                                    @else
                                                    <img src="{{asset('img/user.png')}}" class="avatar">
                                                    @endif
                                                </div>
                                                <div class="col-sm-10 mt-3">
                                                    <input type="file" class="form-control-file" id="avatar" name="avatar">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <a type="button" data-dismiss="modal"><i class="fas fa-arrow-left"></i></a>
                                    @if(Auth::user() && Auth::user()->perfil=="admin")
                                    <a href=""><i class="fas fa-edit"></i></a>
                                    <a href=""></a>
                                    <!-- Button trigger modal -->
                                    <a data-toggle="modal" href="#myModal2" style="color:red"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                @endif
                                @if(Auth::user() && Auth::user()->perfil=="user")
                                <a href="" style="color:green"><i class="fas fa-shopping-basket"></i></a>
                                @endif
                                @if(!Auth::user())
                                <a href=""><i class="fas fa-shopping-basket"></i></a>
                                @endif

                            </div>
                        </div>
                    </div>
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


<table>
    <tr>
        <td></td>
    </tr>
</table>
<script>

</script>

@endsection