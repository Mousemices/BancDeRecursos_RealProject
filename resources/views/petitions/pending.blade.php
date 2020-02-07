@extends('layouts.app')
@section('content')

<div class="col-11 col-sm-12 adminTable-sortides py-4">
    <div class="field header">
        <h1>Sortides per validar</h1>
        <hr>
    </div>
    @if(isset($pendingPetitions))
            <table> 
                <tr> 
                    <th>ID</th>
                    <th>Títol</th>
                    <th>Descripció</th>
                    <th>Quantitat</th>
                    <th>Acceptar</th>
                    <th>Rebutjar</th>
                    <th>Editar</th>

                </tr>
                @foreach ($pendingPetitions as $petition)            
                <tr>
                    <td><div class="tableContentCell">{{$petition->id}}</div></td>
                    <td><div class="tableContentCell">{{$petition->title}}</div></td>
                    <td class="anim"><div class="tableContentCell">{{$petition->description}}</div></td>
                    <td class=""><div class="tableContentCell">{{$petition->quantity}}</div></td>
                    <td class="form-AdminBtn">                 
                        <form action="/petitionapproved/{{$petition->id}}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="botonLista btn btn-success" type="submit">Acceptar</button>
                        </form>
                    </td>
                    <td class="form-AdminBtn">
                        <form action="/petitionReject/{{$petition->id}}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="botonLista btn btn-danger" type="submit">Rebutjar</button> 
                        </form>
                    </td>
                    <td class="form-AdminBtn">
                        <form action="/petition/{{$petition->id}}/edit" method="post">
                            @csrf
                            @method('GET')
                            <button class="botonLista btn btn-warning" type="submit">Editar</button> 
                        </form>
                    </td>
                </tr>
                @endforeach  
                
            </table>             
    @endif           
        </div>  
@endsection