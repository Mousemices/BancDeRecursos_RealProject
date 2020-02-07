@extends('layouts.app')
@section('content')
<h1>Incoming Donations List</h1>
<table> 
    <tr>
        <th>Petition</th>
        <th>Time</th>
        <th>Status</th>
    </tr>
    @foreach ($petitions as $petition)
        <tr>
            
            <td>{{$petition->created_at}}</td>
            <td>
                <form method="GET" action="/application/{{$petition->id}}/edit">
                    @csrf
                    <input class="botonLista" type="submit" value="Validar">
                </form> 
            </td>
            <td>
                <form action="/application/{{$petition->id}}" method="post">
                    @csrf
                    @method('DELETE')
                <button class="botonLista" type="submit">Aceptar</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<a type="button" class="btn btn-primary" href="/application/create">Create Application</a>
@endsection