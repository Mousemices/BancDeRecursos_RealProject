@extends('layouts.app')
@section('content')

<div class="py-4 row justify-content-center">
    <form action="/petition/{{$petition->id}}" class="form-bg gridForm col-md-11 col-sm-12 col-lg-8 " method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH') 
        <div class="field header">
            <h1>Editar Sol·licituds</h1>
            <hr>
        </div>
        <div class="main">
                <div class="field one">
                    <input class="input-form"  type="number" name="quantity" value="{{$petition->quantity}}" required>
                    <label class="lab"  for="quantity">Quantitat</label>
                    <span class="small">Introduïu la quantity que voleu*</span>
                </div>
                <div class="field two">
                    <input class="input-form"  type="text" name="observations" value="{{$petition->observations}}" required>
                    <label class="lab"  for="pickup_direction">Observacions</label>
                    <span class="small">Introduïu les Observacions*</span>
                </div>
                <div class="field three">
                    <input class="input-form"  type="email" name="email" value="{{$petition->email}}" required>
                    <label class="lab"  for="pickup_date">Correu electrònic</label>
                    <span class="small">Introduïu el Correu electrònic*</span>
                </div>
            </div>

            <div class="field footer">
                <hr>
                <button type="submit" class="input-form btn btn-primary">Enviar</button>
            </div>
    </form>
</div>
@endsection