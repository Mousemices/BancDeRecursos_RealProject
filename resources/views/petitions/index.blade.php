@extends('layouts.app')
@section('content')    

<div class="col-11 col-sm-12 adminTable-sortides py-4">
    <div class="field header">
        <h1>Totes les Sortides</h1>
        <hr>
    </div>    
        @if(isset($petitions)) 
        <table> 
            <tr> 
                <th>ID</th>
                <th>Materials Sol.licitats</th>
                <th>Quantitat Sol.licitada</th>
                <th>Entitat que ha sol.licitat</th>

            </tr>                            
                @foreach ($petitions as $petition) 
                <tr>
                    <td><div class="tableContentCell">{{$petition->id}}</div></td>
                    <td class="anim"><div class="tableContentCell">{{$petition->batch->description}}</div></td>
                    <td><div class="tableContentCell">{{$petition->quantity}}</div></td>
                    <td class=""><div class="tableContentCell">{{$petition->user->entity_name}}</div></td>
                </tr>                  
       
                @endforeach    
        </table>               
        @endif
@endsection