@extends('admin.layout')

@section('content')
@include('includes.flash-message')

<h1 class="text-center mb-4 text-4xl font-bold text-gray-800">Orders</h1>

<table class="table table-hover mt-5">
    <tr>
        <td>Orders number</td>
        <td>Users Email</td>
        <td>Orders price</td>
        <td>Orders status</td>

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
