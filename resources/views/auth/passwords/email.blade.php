@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="row justify-content-center">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" class="form-bg gridForm reset col-md-8 col-sm-12 col-lg-6"  action="{{ route('password.email') }}">
                        @csrf

                        <div class="field header py-4">
                            <h1 class="orange">Reseteja la teva contrasenya</h1>
                            <div class="loginText">
                                <span class="small">Introduïu les dades requerides</span>
                            </div>
                        </div> 

                        <div class="main">
                            <div class="field one">
                                <input id="email" type="email" class="input-form @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="email" class="lab">{{ __('E-Mail Address') }}</label>

                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="field footer py-4">
                                <button type="submit" class="input-form btn btn-primary">
                                    Envia l'enllaç de restabliment de contrasenya
                                </button>                       
                         </div>
                    </form>
               
    </div>
</div>
@endsection
