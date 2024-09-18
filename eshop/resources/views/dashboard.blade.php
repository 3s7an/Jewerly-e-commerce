@extends('layout')

@section('content')
@include('includes.flash-message')
<div class="flex">
    <!-- Sidebar -->
    <div class="w-1/5">
        @include('includes.sidebar')
    </div>

    <!-- Produkty -->
    <div class="w-4/5">

        <div class="bg-gray-100 flex flex-col items-center justify-center p-8 rounded-lg shadow-md mt-10">
            <h1 class="text-gray-800 font-lobster text-7xl my-10">Zlatníctvo</h1>
            <p class="text-gray-700">Nejaký trápny slogan</p>
        </div>

        <hr>

        <h1 class="text-center my-20 font-bold text-4xl font-popins">Produkty :</h1>


        <div class="flex flex-wrap">
            @foreach ($products as $product)
                @include('includes.product-box')
            @endforeach
        </div>
    </div>
</div>

@endsection
