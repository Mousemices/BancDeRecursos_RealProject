@extends('layouts.app')
@section('content')
<div class="py-4 row justify-content-center">
    <form action="/batch" method="POST" class="form-bg gridForm donation col-md-11 col-sm-12 col-lg-8 " enctype="multipart/form-data">
        @csrf

        <div class="field header">
            <h1>Donar Material</h1>
            <hr>
        </div>

            <div class="main">
            
                <div class="field one prueba">
                    <input class="input-form" type="name" name="title" id="name" required>
                    <label class="lab" for="name">Nom de l'article</label>
                    <span class="small">Introduïu el nom de l’article*</span>
                </div>
                
                <div class="field two">
                    <input class="input-form" type="tel" name="phone" id="phone" required>
                    <label class="lab" for="phone">Telèfon</label>
                    <span class="small">Introduïu el Telèfon</span>
                </div>

                <div class="field three">
                    <input class="input-form" type="email" name="email" id="email" required />
                    <label class="lab" for="email">Correu electrònic</label>
                    <span class="small">Introduïu el Correu electrònic*</span>
                </div>

                <div class="field four">
                    <input class="input-form" type="number" name="quantity" id="quantity" min="0" max="{{$batch->quantity}}" required>
                    <label class="lab" for="quantity">Quantitat Material</label>
                    <span class="small">Introduïu el Correu electrònic*</span>
                </div>

                <div class="field five">
                    <input class="input-form" type="text" name="category" id="category"   required>
                    <label class="lab" for="category">Categoria material</label>
                    <span class="small">Introduïu la categoria*</span>
                </div>

                <div class="field six">
                    <input class="input-form" type="text" name="delivery_direction" id="address"  required>
                    <label class="lab" for="address">Lloc recollida</label>
                    <span class="small">Introduïu el lloc de recollida*</span>
                </div>

                <div class="field seven">
                    <input class="input-form" type="date" name="pickup_date" id="date"  required>
                    <label class="lab" for="date">termini de recollida</label>
                    <span class="small">Introduïu el termini de recollida*</span>
                </div>

                <div class="field eight">
                    <input class="input-form" type="text" name="province" id="province"  required>
                    <label class="lab" for="province">Provincia</label>
                    <span class="small">Introduïu la provincia*</span>
                </div>

                <div class="field nine">
                    <textarea class="input-form" name="description" id="description"></textarea>
                    <label class="lab" for="description">Breu descripció</label>
                    <span class="small">Introduïu una descripció*</span>
                </div>

                <div class="field ten">
                    <label class="input-form label" for="file"></label>
                    <label class="lab" for="file">puja les fotos del material</label>
                    <input class="input-form file" type="file" name="file" id="file"required>
                    <span class="small">Introduïu les fotos*</span>
                </div>

                <div class="field eleven">
                    <input class="input-form" type="checkbox" name="terms" id="terms" required>
                    <label for="terms" class="custom-checkbox"></label>
                    <span>Acceptar <a href="#">termes i condicions</a></span>
                </div>

                <!-- <div class="field qwe">&nbsp;</span> -->
        </div>
        <div class="field footer">
            <hr>
            <button  type="submit" class="input-form btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
@endsection