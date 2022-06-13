@extends('layouts.main')
@include("_partials/head")
@section('content')
@include("_partials/nav")


<div class="row d-flex justify-content-center">
    <div class="card bg-dark text-white text-center border-0 mx-3 my-4 py-2" style="width: 20rem;">
        <img class="card-img-top" src="{{ $appartment->Img }}" alt="Photo">
        <div class="card-body">
            <h5 class="card-title">{{$appartment->Adresas}}</h5>
            <p class="mb-2">{{ $appartment->Miestas }} </p>
            <p class="mb-2 text-justify-center text-wrap">{{Str::limit($appartment->Description, 100)}}</p>
            <p class="mb-2">{{ number_format($appartment->Kaina, 2)}} €</p>
        @if($appartment->Owner == Auth::id())
        <a  class=" btn btn-success"  href="/butai/edit/{{ $appartment->id }}">Redaguoti</a>
        <a  class=" btn btn-danger"  href="/butai/delete/ask/{{ $appartment->id }}">Istrinti</a>
        @endif
        </div>
    </div>
</div>

@include("_partials/footer")


@endsection