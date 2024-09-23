@extends('layout')

@section('content')
@include('includes.flash-message')
<div class="flex justify-center min-h-screen">
    <div class="container mx-4 sm:mx-6 lg:mx-8 rounded-lg mt-20">
<h1>Moje objednávky</h1>

@foreach ($orders as $order)

{{$order->order_number}}

@endforeach

</div>
</div>
@endsection
