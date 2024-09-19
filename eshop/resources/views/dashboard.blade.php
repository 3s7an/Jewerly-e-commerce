@extends('layout')

@section('content')
@include('includes.flash-message')
<div class="flex flex-col md:flex-row min-h-screen">

    <!-- Sidebar -->
    <div class="w-full md:w-1/5 bg-gray-200 md:min-h-screen">
        @include('includes.sidebar')
    </div>

    <!-- Produkty -->
    <div class=" md:w-4/5 ml-4">
        <div class="bg-gray-100 flex flex-col items-center ml-2 mr-4 mt-4 justify-center md:p-8 rounded-lg shadow-md">
            <h1 class="text-gray-800 font-lobster text-4xl md:text-7xl my-4 md:my-10">Zlatníctvo</h1>
            <p class="text-gray-700 text-sm md:text-base">Nejaký trápny slogan</p>
        </div>



        <h1 class="text-center my-8 md:my-20 font-bold text-2xl md:text-4xl font-popins">
            <i class="fa-solid fa-gem fa-xs md:fa-2xs"></i> Spoznajte naše produkty <i class="fa-solid fa-gem fa-xs md:fa-2xs"></i>
        </h1>

        <div class="flex flex-wrap gap-4">
            @foreach ($products as $product)
                @include('includes.product-box')
            @endforeach
        </div>
    </div>
</div>
@endsection

