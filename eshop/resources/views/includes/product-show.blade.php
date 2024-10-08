@extends('layout')

@section('content')
<div class="flex justify-center min-h-screen bg-gray-100 py-12">
    <div class="container mx-auto max-w-7xl rounded-lg bg-white shadow-lg p-6 mt-24">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2 mb-6 md:mb-0">
                <img src="{{ $product->getImageURL() }}" class="w-full rounded-lg shadow-md transition-transform transform hover:scale-105" alt="{{ $product->name }}">
            </div>
            <div class="md:w-1/2 md:pl-6 align-center justify-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                <p class="text-lg text-gray-600 mb-2">Popis produktu</p>
                <p class="text-gray-700 mb-6 text-base">{{ $product->description }}</p>
                <div class="flex  mb-4">
                    <span class="text-lg font-semibold mx-auto">Cena:</span>
                    <span class="text-2xl font-bold text-green-600 ml-2">{{ $product->price }} €</span>
                </div>

                <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button class="bg-yellow-500 text-white font-semibold py-3 px-6 rounded-lg shadow hover:bg-yellow-600 transition duration-200 flex items-center justify-center mx-auto" type="submit" name="cart-send">
                        <i class="fa-solid fa-cart-shopping mr-2"></i> Do košíku
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection






