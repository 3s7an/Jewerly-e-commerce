@extends('layout')

@section('content')
@include('includes.flash-message')
<div class="flex">
    <!-- Sidebar -->
    <div class="w-1/4">
        @include('includes.sidebar')
    </div>

    <!-- Produkty -->
    <div class="w-3/4">
        <h2 class="text-center m-4 bold">Produkty :</h2>

        <div class="flex flex-wrap">
            @foreach ($products as $product)
                @include('includes.product-box')
            @endforeach
        </div>
    </div>
</div>

@endsection
