@extends('layout')

@section('content')
    @include('includes.flash-message')

    <div class="flex justify-center min-h-screen">
        <div class="container mx-4 sm:mx-6 lg:mx-8 rounded-lg mt-24">
            <h1 class="text-center text-3xl font-bold mb-5 mt-10">Your cart items</h1>

            @if ($cartItems->isNotEmpty())
                <!-- Karta pre zobrazenie položiek v košíku -->
                <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
                    <div class="overflow-x-auto flex justify-center">
                        <table class="border border-gray-300 divide-y divide-gray-200 w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th
                                        class="px-4 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Product name</th>
                                    <th
                                        class="px-4 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Quantity</th>
                                    <th
                                        class="px-4 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Price</th>
                                    <th class="px-4 py-4"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td class="px-4 py-4 whitespace-nowrap">{{ $item->product->name }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <button type="button"
                                                class="plus bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-1 px-2 rounded"
                                                data-item-id="{{ $item->id }}"><i class="fa-solid fa-plus"></i></button>
                                            <input type="text" value="{{ $item->quantity }}"
                                                class="w-16 border border-gray-300 rounded-md px-2 py-1 item_quantity"
                                                min="1" readonly>
                                            <button type="button"
                                                class="minus bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-1 px-2 rounded"
                                                data-item-id="{{ $item->id }}"><i
                                                    class="fa-solid fa-minus"></i></button>
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

                    <!-- Celková suma a tlačidlo na pokračovanie -->
                    <div class="flex justify-between items-center mt-6">
                        <h4 class="text-lg font-semibold">Total price : {{ $totalPrice }}<i
                                class="fa-solid fa-euro-sign fa-xs"></i></h4>
                        <form action="{{ route('order.index') }}">
                            <button
                                class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">Continue</button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Karta pre prázdny košík -->
                <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6 mt-10 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/2762/2762885.png" alt="prazdny kosik"
                        class="w-[10rem] mb-4 mx-auto">
                    <p class="text-gray-600">There are no items in your cart</p>
                </div>
            @endif

        </div>
    </div>


@endsection
