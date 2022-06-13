@extends('layouts.main')

@section('content')
@include("_partials/nav")
    <h1 class="text-center">Siulomi butai</h1>
    <form action="/butai/search" method="GET">
        <input type="text" name="query">
        <button type="submit">Search</button>
    </form>
    <table class="table table-info">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Miestas</th>
                <th scope="col">Adresas</th>
                <th scope="col">Description</th>
                <th scope="col">Plotas</th>
                <th scope="col">Kaina</th>
                <th scope="col">Keitimas</th>
            </tr>
        </thead>
        <tbody>       
        @foreach($appartments as $appartment)
            <tr>
                <th scope="row">{{ $appartment->id}}</th>
                <td>{{ $appartment->Miestas }}</td>
                <td>{{ $appartment->Adresas }}</td>
                <td>{{ $appartment->Description, 50 }}</td>
                <td>{{ $appartment->Plotas }}</td>
                <td>{{ $appartment->Kaina }}</td>
                <td>
                    <a  class=" btn btn-success"  href="/butai/edit/{{ $appartment->id }}">Edit</a>
                    <a  class=" btn btn-danger"  href="/butai/delete/ask/{{ $appartment->id }}">Delete</a>

                </td>
            </tr>
            
        
        
        @endforeach
        </tbody>

    
    </table>
    @include("_partials/footer")

@endsection