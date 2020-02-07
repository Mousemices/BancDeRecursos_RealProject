@extends('layouts.app')
@section('content')

<div class="col-11 col-sm-12 adminTable py-4">

    <div class="field header">
        <h1>
            Lots per validar</h1>
        <hr>
    </div>
    @if(count($batch)<1)
    <h1>There are no Batches to validate right now!</h1>
    @endif
    @if(count($batch)>0)
    <table> 
        <tr>
            <th>Batch</th>
            <th>Time</th>
            <th>Description</th>
            <th>Donor Company</th>
            <th>Direccio de recollida</th>
            <th>Quantitat</th>
            <th></th>

        </tr>
        @foreach ($batch as $item)
            <tr>
                <td><div class="tableContentCell">{{$item->title}}</div></td>
                <td><div class="tableContentCell">{{$item->created_at}}</div></td>
                <td class="anim"><div class="tableContentCell">{{$item->description}}</div></td>
                <td><div class="tableContentCell">{{$item->donor_company}}</div></td>
                <td class="anim"><div class="tableContentCell">{{$item->delivery_direction}}</div></td>
                <td><div class="tableContentCell">{{$item->quantity}}</div></td>
                <td class="form-AdminBtn">
                    <form action="/rejectbatch/{{$item->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <button class="botonLista btn btn-danger" type="submit">Rechazar</button> 
                    </form>
                    <form action="/approvedbatch/{{$item->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <button class="botonLista btn btn-success" type="submit">Aceptar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endif
</div>
@endsection