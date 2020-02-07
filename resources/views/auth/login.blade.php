@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="row justify-content-center">
        <form method="POST" class="form-bg gridForm login col-md-8 col-sm-12 col-lg-6" action="{{ route('login') }}">
            @csrf

            <div class="field header py-4">
                <h1 class="orange">Benvingut al Pont Solidari</h1>
                <div class="loginText">
                    <span class="small">Introduïu les dades requerides</span>
                </div>
            </div> 

            <div class="main">

                <div class="field one">
                    <input id="email" type="email" class="input-form @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="email" class="lab">{{ __('E-Mail Address') }}</label>
                    @error('email')
                    <span class="small" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="field two">
                    <input id="password" type="password" class="input-form @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <label for="password" class="lab">{{ __('Password') }}</label>
                    @error('password')
                    <span class="small invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="field three">
                    @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
                
                <div class="field four">
                    <input class="input-form" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="custom-checkbox">Recorda'm</label>

                </div>
            </div>

            <div class=" field footer py-4">
                <button type="submit" class="input-form btn btn-primary">
                    Iniciar la sessió
                </button>

                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">No tens compte? Registra't</a>
                @endif
            </div>

        </form>

    </div>

</div>
@endsection