<div id="section1"></div>
<h1 id="titleBatch">Donacions Dispinibles</h1>
<div id="avaliableBatches">
    @isset($batchAvaliables)
        @for ($i = 0; $i < count($batchAvaliables); $i++)
            <form class="avaliableBatch batchPosition{{ $i }}" action="batch/{{$batchAvaliables[$i]->id}}" method="get">
                <img src="{{asset($avaliablesBatchImg[$i])}}" alt="batch Img" class="batchImg" name="img">
                <p>{{$batchAvaliables[$i]->id}}</p>
                <p>{{$batchAvaliables[$i]->title}}</p>
                <p>{{$batchAvaliables[$i]->description}}</p>
                <input class="showBatch" type="submit" value=""/>
            </form>
        @endfor
    @endisset


</div>
{{--@foreach ($batchAvaliables as $index => $user)
    <p>{{ $index }}</p>
@endforeach--}}
<div id="batchPagination">{{ $batchAvaliables->links() }}</div>
