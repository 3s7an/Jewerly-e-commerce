@extends('layout')

@section('content')
<div class="container mx-auto py-6 px-4">
    <div class="flex flex-col md:flex-row justify-around items-center w-full">
        <div class="md:w-1/3 mb-6 md:mb-0">
            <img src="{{ $product->getImageURL() }}" class="w-full rounded-lg shadow-lg" alt="{{ $product->name }}">
        </div>
        <div class="md:w-2/3 text-center md:text-left">
            <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
            <p class="text-lg text-gray-700 mb-4">Popis produktu</p>
            <p class="text-gray-600 mb-6 text-base">{{ $product->description }}</p>
            <p class="text-lg font-semibold mb-2">Cena produktu</p>
            <p class="text-xl font-bold text-green-600 mb-6">{{ $product->price }}</p>

            <form action="{{ route('cart.add') }}" method="POST" class="inline-block">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="bg-yellow-500 text-white font-semibold py-2 px-4 rounded shadow hover:bg-yellow-600 transition duration-200" type="submit" name="cart-send">
                    <i class="fa-solid fa-cart-shopping"></i> Do košíku
                </button>
            </form>
        </div>
    </div>
</div>
@endsection





