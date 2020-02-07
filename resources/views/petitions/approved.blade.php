@extends('layouts.app')
@section('content')

<div class="col-11 col-sm-12 adminTable-approved py-4">
    <div class="field header">
        <h1>
            Sortides</h1>
        <hr>
    </div>
    @if(isset($approvedPetitions))
            <table> 
                <tr>
                    <th>ID</th>
                    <th>Títol</th>
                    <th>Descripció</th>
                    <th>Tornar a l’estat pendent d’aprovació</th>

                </tr>
                @foreach ($approvedPetitions as $petition)            
                <tr>
                    <td><div class="tableContentCell">{{$petition->id}}</div></td>
                    <td><div class="tableContentCell">{{$petition->title}}</div></td>
                    <td class="anim"><div class="tableContentCell">{{$petition->description}}</div></td>
                    <td class="form-AdminBtn">                        
                        <form action="/petitionToPending/{{$petition->id}}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="botonLista btn btn-warning" type="submit">tornar a l’estat pendent d’aprovació</button>
                        </form>
                    </td>
                </tr>
                @endforeach  
                
            </table>             
    @endif           
        </div>  
@endsection