@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="row justify-content-center">
                    <form method="POST" class="form-bg gridForm recover col-md-8 col-sm-12 col-lg-6" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="field header py-4">
                            <h1 class="orange">Recupera la teva contrasenya</h1>
                            <div class="loginText">
                                <span class="small">Introduïu les dades requerides</span>
                            </div>
                        </div> 

                        <div class="main">
                            <div class="field one">
                               <input id="email" type="email" class="input-form @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                <label for="email" class="lab">{{ __('E-Mail Address') }}</label>
                                                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="field two">
                               <input id="password" type="password" class="input-form @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label for="password" class="lab">{{ __('Password') }}</label>
                                                                
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="field three">
                                <input id="password-confirm" type="password" class="input-form" name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm" class="lab">{{ __('Confirm Password') }}</label>
                               
                            </div>
                        </div>

                        <div class="field footer py-4">
                                <button type="submit" class="input-form btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                        </div>
                    </form>
    </div>
</div>
@endsection
