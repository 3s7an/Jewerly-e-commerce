<style>
    .description-container {
        word-wrap: break-word;
        word-break: break-word;
        overflow-wrap: break-word;
    }
</style>

@extends('layout')

@section('content')
<div class="container py-4">
    <div class="row justify-content-around">
        <div class="col-md-4">
            <img src="{{ $product->getImageURL() }}" class="card-img-top" alt="{{ $product->name }}" style="width: 100%;">
        </div>
        <div class="col-md-6 description-container">
            <h1>{{ $product->name }}</h1>
            <p class="fs-20">{{ $product->description }}</p>
        </div>
    </div>
</div>
@endsection





