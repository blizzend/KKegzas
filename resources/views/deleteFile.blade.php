@extends('layouts.main')
@include("_partials/head")
@section('content')
@include("_partials/nav")


<div class="text-center">
    <div class="card row-2 mx-auto" style="width: 18rem;"> 
        <div class="card-body text-center bg-dark text-light">
            <h5 class="card-title fs-4 fw-bold">{{ $appartment->Miestas }}</h5>
            <p class="card-text">{{ $appartment->Description }}</p>
            <p class="mb-8">$ {{$appartment->Kaina}}</p>
            <a href="/butai/delete/{{ $appartment->id }}" class="btn btn-danger my-2 border-0">Taip</a>
            <a href="/butai/View" class="btn btn-primary my-2 mx-4 border-0">Ne</a>
    </div>
</div>
    

@include("_partials/footer")
@endsection
