@extends('layouts.app')

@section('content')
<div class="container h-500" style="height:500px">
    <div class="row justify-content-center h-500" style="height:500px">
        <div class="col-sm-12 col-lg-6 align-self-center h-500" style="height:500px">
            <form method="POST" action="{{ route('login') }}" class="formulario">
                @csrf
                <div class="form-group row col-sm-12 col-lg-10 mx-auto">
                    <div class="input-icons">
                        <i class="fas fa-user icon"></i>
                        <input id="email" placeholder="Email" style="text-align: center;" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row col-sm-12 col-lg-10 mx-auto">
                    <div class="input-icons"></i><i class="far fa-eye icon" id="togglePassword"></i>
                        <input id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" data-toggle="password" class="form-control" type="password" placeholder="Contraseña" style="text-align: center;">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row ">
                    <div class="text-center col-lg-12 offset-lg-6 mx-auto">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-lg-12 offset-lg-6 mx-auto text-center">
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
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>
@endsection