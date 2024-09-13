@extends('admin.layout')

@section('content')
@include('includes.flash-message')

<h1 class="text-center mb-4">Objednávky</h1>
<table class="table table-hover mt-5">
    <tr>
        <td>Čislo objednavky</td>
        <td>Email uživateľa</td>
        <td>Cena objednávky</td>
        <td>Status objednávky</td>

    </tr>

    @foreach ($orders as $order)
        <tr>
            <td>{{$order->order_number}}</td>
            <td>{{$order->user->email}}</td>
            <td>{{$order->total_price}} EUR</td>
            <td>{{$order->status}}</td>
            <td><a href="{{route('admin.order.show', $order->id)}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
        </tr>
    @endforeach

@endsection
