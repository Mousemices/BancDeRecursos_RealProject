@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="row justify-content-center">

                    <form method="POST" class="form-bg gridForm register col-md-8 col-sm-12 col-lg-6" action="{{ route('register') }}">
                        @csrf

                        <div class="field header py-4">
                            <h1 class="orange">Registra't al al Pont Solidari</h1>
                            <div class="loginText">
                                <span class="small">Introduïu les dades requerides</span>
                            </div>
                        </div> 
                        <div class="main">
                            <div class="field one">
                                <input id="name" type="text" class="input-form @error('name') is-invalid @enderror" name="entity_name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <label for="name" class="lab">{{ __('Name') }}</label>
                                                                
                                    @error('name')
                                        <span class="small invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div> 

                            <div class="field eleven">
                                <input id="name" type="text" class="input-form @error('name') is-invalid @enderror" name="entity_type" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <label for="name" class="lab">{{ __('Name') }}</label>
                                                                
                                    @error('name')
                                        <span class="small invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div> 

                            <div class="field two">
                                <input id="email" type="email" class="input-form @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <label for="email" class="lab">{{ __('E-Mail Address') }}</label>
                                @error('email')
                                    <span class="small invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="field three">
                                <input id="password" type="password" class="input-form @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label for="password" class="lab">{{ __('Password') }}</label>
                                                            
                                @error('password')
                                    <span class="small invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="field four">
                                <input id="password-confirm" type="password" class="input-form" name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm" class="lab">{{ __('Confirm Password') }}</label>
                               
                            </div>
                        </div>

                        <div class="field footer py-4">
                            <button type="submit" class="input-form btn btn-primary">
                                Registra't
                            </button>
                                     
                            @if (Route::has('login'))
                                        <a class="nav-link" href="{{ route('login') }}">Tens compte? Inicia la sessió</a>
                            @endif
                        </div>
                    </form>
</div>
@endsection
