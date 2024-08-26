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
        <div class="col-md-6 description-container text-center">
            <h1>{{ $product->name }}</h1>
            <p class="lead mt-5">Popis produktu</p>
            <p class="mb-5 fs-20">{{ $product->description }}</p>
            <p class="lead">Cena produktu</p>
            <p class="fs-20">{{ $product->price}}</p>

            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="btn btn-warning btn-sm mt-4" type="submit" name="cart-send"><i class="fa-solid fa-cart-shopping"></i> Do košíku</button>
            </form>


        </div>
    </div>
</div>
@endsection





