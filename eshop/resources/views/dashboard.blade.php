@extends('layout')

@section('content')

 

    <h2 class="text-center">Naše produkty</h2>


   <div class="d-inline-flex flex-wrap">

    @foreach ($products as $product)
        @include('includes.product-card')
    @endforeach

</div>
@endsection
