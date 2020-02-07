@extends('layouts.app')
@section('content')

<div class="py-4 row justify-content-center">
    <form action="/batch/{{$batch->id}}" class="form-bg gridForm col-md-11 col-sm-12 col-lg-8 " method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="field header">
            <h1>Editar Sol·licituds</h1>
            <hr>
        </div>
        <div class="main">
                <div class="field one">
                    <input class="input-form"  type="number" name="quantity" value="{{$batch->quantity}}" required>
                    <label class="lab"  for="quantity">Quantitat</label>
                    <span class="small">Introduïu la quantity que voleu*</span>
                </div>
                <div class="field two">
                    <input class="input-form"  type="text" name="delivery_direction" value="{{$batch->delivery_direction}}" required>
                    <label class="lab"  for="pickup_direction">Direcció de recollida</label>
                    <span class="small">Introduïu la direcció de recollida*</span>
                </div>
                <div class="field three">
                    <input class="input-form"  type="date" name="pickup_date" value="{{$batch->pickup_date}}" required>
                    <label class="lab"  for="pickup_date">Data de recollida</label>
                    <span class="small">Introduïu la data de recollida*</span>
                </div>
                <div class="field four">
                    <input class="input-form"  type="text" name="donor_company" value="{{$batch->donor_company}}">
                    <label class="lab"  for="donor_company">Entitat donant</label>
                    <span class="small">Introduïu el nom de l’entitat donant*</span>
                </div>
            </div>

            <div class="field footer">
                <hr>
                <button type="submit" class="input-form btn btn-primary">Enviar</button>
            </div>
    </form>
</div>
@endsection