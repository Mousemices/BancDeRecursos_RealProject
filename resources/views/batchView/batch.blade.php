@extends('layouts.app')
@section('content')

<div class="col-11 col-sm-12 adminTable-approved py-4">
    <div class="field header">
        <h1>Tots els lots Aceptats | <a href="/batch/create" type="button" class=" btn btn-approved"><i class="fas fa-plus"></i> Carregar Lot</a></h1>
        
        <hr>
    </div>
                       
   
        @if(isset($batchList))
        
        <table> 
            <tr> 
                <th>ID</th>
                <th>Títol</th>
                <th>Quantitat</th>
                <th>Entitat donant</th>
                <th>Descripció</th>
                <th>Editar</th>

            </tr>
                @foreach ($batchList as $batch) 
                <tr>
                    <td><div class="tableContentCell">{{$batch->id}}</div></td>
                    <td><div class="tableContentCell">{{$batch->title}}</div></td>
                    <td class=""><div class="tableContentCell">{{$batch->quantity}}</div></td>
                    <td><div class="tableContentCell">{{$batch->donor_company}}</div></td>
                    <td class="anim"><div class="tableContentCell">{{$batch->description}}</div></td>
               
                    <td class="form-AdminBtn">
                        <form action="/batch/{{$batch->id}}/edit" method="post">
                            @csrf
                            @method('GET')
                            <button class="botonLista btn btn-warning" type="submit">Editar</button> 
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
        @endif
@endsection