@extends('layouts.app')

@section('content')
<div class="container h-500" style="height:500px">
    <div class="row justify-content-center h-500" style="height:500px">
        <div class="col-md-8 align-self-center h-500" style="height:500px">
                    <form method="POST" action="{{ route('login') }}" class="formulario">
                        @csrf

                        <div class="form-group row">
                            <div class="col-sm-6 input-icons mx-auto">



                                <i class="fas fa-at icon"></i>
                                <input id="email" placeholder="Email" style="text-align: center;" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 input-icons mx-auto">
                                <i class="fas fa-key icon"></i>
                                <input id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" data-toggle="password" class="form-control" type="password" placeholder="Contraseña" style="text-align: center;">
                                <i class="far fa-eye ojo" id="togglePassword"></i>
                                <!--<input type="checkbox" id="checkbox">Show Password-->
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                            <div class="form-group row mb-0">

                            </div>
                    </form>
                </div>
            </div>
        </div>

<script>
    $(document).ready(function() {
        $('#checkbox').on('change', function() {
            $('#password').attr('type', $('#checkbox').prop('checked') == true ? "text" : "password");
        });
    });
</script>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>
@endsection