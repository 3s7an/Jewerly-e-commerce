@extends('layout')

@section('content')
@include('includes.flash-message')
<h1 class="text-center text-3xl font-bold mb-5">Tvoj košík</h1>

<div class="overflow-x-auto">
    <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Názov produktu</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Množstvo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cena</th>
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($cartItems as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <input type="number" value="{{ $item->quantity }}" min="1" max="100" class="w-16 border border-gray-300 rounded-md px-2 py-1">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">${{ $item->product->price }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="text-red-600 hover:text-red-800 transition duration-150">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<hr class="my-6 border-gray-300">

<div class="flex justify-end">
    <form action="{{route('order.index')}}" class="flex flex-col items-end">
        <h4 class="text-lg font-semibold mt-3">Celková cena: {{$totalPrice}}</h4>
        <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded mt-4">Pokračovať</button>
    </form>
</div>

@endsection
