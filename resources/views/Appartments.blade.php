@extends('layouts.main')
@include("_partials/head")
@section('content')
@include("_partials/nav")


<div class="container p-5">
    <div class="row">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRe37ee_-OOC11J-qME95STPzMxOSJZjnE4iQ&usqp=CAU"
            alt="XD"style="height: 400px;" class="p-4">
    </div>

    <div class="alert alert-dark py-5 text-center text-white" style="background-color: rgb(74, 75, 80);" role="alert">
        Populiariausi Butai
    </div>

    <div class="row">
        @foreach($appartments as $appartment)
            <div class="card bg-dark border-radius text-white text-center border mx-3 my-4 py-2" style="width: 20rem;">
                <img class="card-img-top" src="{{ $appartment->Img }}" alt="Photo" style="height: 10rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$appartment->Miestas}}</h5>
                    <p class="mb-2 text-justify-center text-wrap">{{Str::limit($appartment->Description, 100)}}</p>
                    <p class="mb-2">{{ number_format($appartment->Kaina, 2)}} €</p>
                    <a href="/butai/View/{{$appartment->id}}" class="btn btn-primary border border-warning border-2 border-0" style="font-family:Arial Black;"><i class="fas fa-angle-double-left"></i> Plačiau <i class="fas fa-angle-double-right"></i> </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
    
    @include("_partials/footer")


@endsection
