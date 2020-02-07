@extends('layouts.app')
@section('content')
    <div class="py-4 row justify-content-center">
        <form action="/petition/{{$batch->id}}" method="POST" class="form-bg gridForm col-md-11 col-sm-12 col-lg-8 ">
                    @csrf

                    <div class="field header">
                        <h1>Sol·licita Material</h1>
                        <hr>
                    </div>
                    <div class="main">
                        <div class="field one">
                            <input class="input-form" type="name" name="name" id="name" required>
                            <label class="lab" for="name">Nom d'entitat</label>
                            <span class="small">Introduïu el nom de l’entitat*</span>
                        </div>

                        <div class="field two">
                            <input class="input-form" type="tel" name="phone" id="phone" required>
                            <label class="lab" for="phone">Telèfon</label>
                            <span class="small">Introduïu el Telèfon</span>
                        </div>

                        <div class="field three">
                            <textarea class="input-form" type="number" name="observations" id="observations" required></textarea>                    
                            <label class="lab" for="observations">Observacions</label>
                            <span class="small">Introduïu les observacions requerides</span>
                        </div>
                        <div class="field four">
                            <input class="input-form" type="email" name="email" id="email"  required>
                            <label class="lab" for="email">Correu electrònic</label>
                            <span class="small">Introduïu el Correu electrònic*</span>
                        </div>

                        <div class="field five">
                            <input class="input-form" type="number" name="quantity" id="quantity" min="0" max="{{$batch->quantity}}"  required>
                            <label class="lab" for="quantity">Quantitat</label>
                            <span class="small">Introduïu la quantitat*</span>
                        </div>

                        <div class="field six">
                            <input class="input-form" type="checkbox" name="terms" id="terms" required>
                            <label for="terms" class="custom-checkbox"></label>
                            <span>Acceptar <a href="#">termes i condicions</a></span>
                        </div>
                    </div>
                    <div class="field footer">
                        <hr>
                        <button  type="submit" class="input-form btn btn-primary">Salvar</button>
                    </div>
                    
        </form>
    </div>

@endsection