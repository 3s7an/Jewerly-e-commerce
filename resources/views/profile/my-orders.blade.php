@extends('layout')

@section('content')
@include('includes.flash-message')

<div class="flex justify-center min-h-screen bg-gray-100 py-10">
    <div class="container mx-auto bg-white shadow-lg rounded-lg p-8 mt-14">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800">Orders history</h1>

        @foreach ($orders as $order)
        <div class="border border-gray-200 rounded-lg mb-6 p-6 bg-gray-50">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h2 class="text-xl font-semibold text-gray-700">Order number: {{$order->order_number}}</h2>
                    <p class="text-gray-500">Order date: {{ $order->created_at->format('d.m.Y') }}</p>
                </div>
                <div>
                    <span class="bg-blue-500 text-white text-sm px-4 py-2 rounded-full">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>

            <div class="border-t border-gray-200 py-4">
                <h3 class="text-lg font-semibold text-gray-600 mb-3">Order items:</h3>
                <ul class="space-y-2">
                    @foreach ($order->items as $item)
                    <li class="flex justify-between text-gray-700">
                        <span>{{ $item->quantity }} x {{ $item->product->name }}</span>
                        <span class="font-medium">{{ number_format($item->product->price, 2) }} €</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex justify-between items-center mt-4">
                <span class="text-lg font-semibold text-gray-800">Total price:</span>
                <span class="text-xl font-bold text-green-500">{{ number_format($order->total_price, 2) }} €</span>
            </div>
        </div>
        @endforeach

        @if($orders->isEmpty())
        <div class="text-center text-gray-500">
            <p>You dont have any orders</p>
        </div>
        @endif
    </div>
</div>
@endsection

