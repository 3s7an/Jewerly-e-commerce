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

        <h1 class="text-center">Zlatnictvo</h1>
        <p class="text-center">Nejaký trápny slogan</p>
        <h1 class="text-center my-9 font-bold text-4xl font-popins">Produkty :</h1>


        <div class="flex flex-wrap">
            @foreach ($products as $product)
                @include('includes.product-box')
            @endforeach
        </div>
    </div>
</div>

@endsection
