@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                    
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12 input-icons" >
                            <i class="fa fa-user icon"></i>
                                <input id="nombre" type="text" class="form-control @error('name') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="name" autofocus placeholder="Nombre" style="text-align: center;">

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                    <div class="form-row">
                        <div class="form-group">

                            <div class="col-md-12">
                                <input id="apellido1" placeholder="Apellido1" type="text" class="form-control @error('name') is-invalid @enderror" name="apellido1" value="{{ old('apellido1') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    

                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="apellido2" placeholder="Apellido2" type="text" class="form-control @error('name') is-invalid @enderror" name="apellido2" value="{{ old('apellido2') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group">
                             <div class="col-md-12">
                                <input id="DNI" placeholder="DNI" type="text" class="form-control @error('DNI') is-invalid @enderror" name="DNI" value="{{ old('DNI') }}" required autocomplete="name" autofocus>

                                @error('DNI')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="telefono" placeholder="Teléfono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="name" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" placeholder="EMAIL" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="Confirmar contraseña" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="ciudad" placeholder="Localidad" type="text" class="form-control @error('name') is-invalid @enderror" name="ciudad" value="{{ old('ciudad') }}" required autocomplete="name" autofocus>

                        <div class="form-group row mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
