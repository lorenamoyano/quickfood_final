@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form method="POST" action="{{ route('register') }}" class="formulario_register">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12 input-icons">
                        <i class="fa fa-user icon"></i>
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="name" autofocus placeholder="Nombre" style="text-align: center;">

                        @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 input-icons">
                        <i class="fa fa-user icon"></i>
                        <input id="apellido1" type="text" class="form-control @error('apellido1') is-invalid @enderror" name="apellido1" value="{{ old('apellido1') }}" required autocomplete="name" autofocus placeholder="Primer apellido" style="text-align: center;">

                        @error('apellido1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="col-md-6 input-icons">
                        <i class="fa fa-user icon"></i>
                        <input id="apellido2" placeholder="Segundo apellido" style="text-align: center;" type="text" class="form-control @error('apellido2') is-invalid @enderror" name="apellido2" value="{{ old('apellido2') }}" required autocomplete="name" autofocus>

                        @error('apellido2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-6 input-icons">
                        <i class="fas fa-address-card icon"></i>
                        <input id="DNI" placeholder="DNI" style="text-align: center;" type="text" class="form-control @error('DNI') is-invalid @enderror" name="DNI" value="{{ old('DNI') }}" required autocomplete="name" autofocus>

                        @error('DNI')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6 input-icons">
                        <i class="fas fa-phone-alt icon"></i>
                        <input id="telefono" placeholder="Teléfono" style="text-align: center;" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="name" autofocus>

                        @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <br>
                <div class="form-group row">
                    <div class="col-md-12 input-icons">
                        <i class="fas fa-at icon"></i>
                        <input id="email" placeholder="EMAIL" style="text-align: center;" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 input-icons">
                        <i class="fas fa-key icon"></i>
                        <input id="password" style="text-align: center;" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6 input-icons">
                        <i class="fas fa-key icon"></i>
                        <input id="password-confirm" style="text-align: center;" placeholder="Confirmar contraseña" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-md-12 input-icons">
                        <i class="fas fa-globe-europe icon"></i>
                        <input id="ciudad" style="text-align: center;" placeholder="Localidad" type="text" class="form-control @error('name') is-invalid @enderror" name="ciudad" value="{{ old('ciudad') }}" required autocomplete="name" autofocus>

                        <div class="form-group row mt-3">
                            <div class="col-lg-6 text-center offset-lg-3">
                                <button type="submit" class="btn btn-primary" id="submit">
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
    @endsection