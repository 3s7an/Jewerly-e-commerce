@extends('layout')

@section('content')
@include('includes.flash-message')
    <h2 class="text-center mb-4">Produkty :</h2>
    </h2>
    <div class="d-flex">


        @foreach ($products as $product)
            @include('includes.product-box')
        @endforeach
    </div>
@endsection
