@extends('layouts.app')
@section('content')
<table> 
    <tr>
        <th>Petition</th> 
        <th>Time</th>
        <th>Status</th>
    </tr>
    @isset($petitions)
    @foreach ($petitions as $petition)
    <tr>
        
        <td>{{$petition->created_at}}</td>
        <td>
            <form action="/petitionReject/{{$petition->id}}" method="post">
                @csrf
                @method('PUT')
            <button class="botonLista" type="submit">Rechazar</button> 
        </td>
        <td>
            <form action="/application/{{$petition->id}}" method="post">
                @csrf
                @method('PUT')
            <button class="botonLista" type="submit">Aceptar</button>
            </form>
        </td>
        <td>
            <form action="/petition/{{$petition->id}}" method="get">
                @csrf
            <button class="botonLista" type="submit">Pending</button>
            </form>
            <form action="/petition/{{$item->id}}/edit" method="post">
                @csrf
                @method('get')
                <button class="botonLista btn btn-warning" type="submit">Editar</button>
            </form>
        </td>
    </tr>
@endforeach
    @endisset
   
</table>
@endsection