@extends('layouts.main')
@include("_partials/head")
@section('content')
@include("_partials/nav")
<div class="container">
    <h1 class="text-center">Prideti buta</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="Miestas" class="form-label">Miestas</label>
            <input class="form-control @error('Miestas') is-invalid @enderror" value="{{ old('Miestas') }} " name="Miestas" id=Miestas" placeholder="Pvz: Kaunas">
        </div>
            <div class="mb-3">
            <label for="Adresas" class="form-label">Adresas</label>
            <input class="form-control @error('Adresas') is-invalid @enderror" value="{{ old('Adresas') }} " id=Adresas" name="Adresas" placeholder="Pvz: Islandijos pl. 55">
        </div>
        <div class="mb-3">
            <label for="Description" class="form-label">Description</label>
            <textarea class="form-control @error('Description') is-invalid @enderror" id="Description" name="Description" rows="3">{{ old('Description') }}</textarea>
        </div>
        <div class=" mb-3">
            <label for="Plotas" class="form-label">Plotas</label>
            <input type="Integer" class="form-control @error('Plotas') is-invalid @enderror" value="{{ old('Plotas') }} " id=Plotas" name="Plotas" placeholder="Pvz: 34" >
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="Integer" class="form-control @error('Kaina') is-invalid @enderror" value="{{ old('Kaina') }} " aria-label="Amount (to the nearest dollar)" name="Kaina" id="Kaina">
            <span class="input-group-text">.00</span>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="image" id="image">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
@include("_partials/footer")
@endsection