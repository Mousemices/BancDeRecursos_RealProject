@extends('layouts.app')
@section('content')
        <h2 id="productDetailTitle">Product {{$batchDetail->title}}</h2>
        @if(isset($batchDetail))
            <div class="batchDetails">
                <div class="batchImg">
                    <img src="{{asset($imgUrl)}}" alt="productImg">
                    <p class="batchDescription">{{$batchDetail->description}} Aquí va la descripció del producte donat!</p>
                </div>
                <div class="batchInfo">
                    <p>Nom del producte: {{$batchDetail->title}}</p>
                    <p>Quantitat: {{$batchDetail->quantity}}</p>
                    <p>Lloc de recollida: {{$batchDetail->description}}</p>
                    <a class="btn btn-success" href="/petition/form/{{$batchDetail->id}}">Sol·licitar</a>
                </div>
            </div>
        @endif
       
    
@endsection
{{-- <p class="mb-0" title="title">{{$batchDetail->title}} | <cite title="quantity">Quantity: {{$batchDetail->quantity}}</cite></p>
                        <footer class="blockquote-footer" title="Description">{{$batchDetail->description}}</footer>
                        <a class="btn btn-success" href="{{route('petition.create', $batchDetail)}}">Sol.licitar aquest material</a> --}}