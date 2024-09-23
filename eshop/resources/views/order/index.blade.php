@extends('layout')

@section('content')
    @include('includes.flash-message')

    <h1 class="text-center text-2xl font-semibold mt-24 mb-8">Zhrnutie objednávky</h1>

    <!-- Dodacie údaje -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6 max-w-2xl mx-auto border border-gray-200">
        <h3 class="text-xl font-semibold mb-4">Dodacie údaje</h3>
        <hr class="my-4">
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                @if (!Auth::check())
                    <!-- Auth sekcia -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Meno:</label>
                        <input type="text" name="name" id="name"
                            class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <div class="mb-4">
                        <label for="surname" class="block text-sm font-medium text-gray-700">Priezvisko:</label>
                        <input type="text" name="surname" id="surname"
                            class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                        <input type="email" name="email" id="email"
                            class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2">
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Dodacia adresa:</label>
                        <input type="text" name="street" id="street"
                            class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2">
                        <input type="text" name="zipcode" id="zipcode"
                            class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2">
                        <input type="text" name="city" id="city"
                            class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2">
                    </div>
                @else
                    <!-- Guest sekcia -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Meno:</label>
                        <input type="text" name="name" id="name"
                            class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 bg-gray-100"
                            value="{{ Auth::user()->name }}" >
                    </div>

                    <div class="mb-4">
                        <label for="surname" class="block text-sm font-medium text-gray-700">Priezvisko:</label>
                        <input type="text" name="surname" id="surname"
                            class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 bg-gray-100"
                            value="{{ Auth::user()->surname }}" >
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                        <input type="email" name="email" id="email"
                            class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 bg-gray-100" readonly
                            value="{{ Auth::user()->email }}" >
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Dodacia adresa:</label>
                        <input type="text" name="street" id="street"
                            class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 bg-gray-100"
                            value="{{ Auth::user()->street }}" >
                        <input type="text" name="zipcode" id="zipcode"
                            class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 bg-gray-100"
                            value="{{ Auth::user()->zipcode }}" >
                        <input type="text" name="city" id="city"
                            class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 bg-gray-100"
                            value="{{ Auth::user()->city }}" >
                    </div>
                @endif
            </div>

    </div>

    <!-- Platba sekcia -->
    <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto border border-gray-200">
        <h3 class="text-xl font-semibold mb-4">Platba</h3>
        <hr class="my-4">

            <div class="flex items-center mb-4">
                <input type="radio" name="payment_method" value="Dobierkou" id="platba" checked class="mr-2">
                <label for="platba" class="text-sm font-medium text-gray-700">Dobierkou</label>
            </div>



    </div>

    <!-- Kosik sekcia -->
    <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto border border-gray-200 mt-6 mb-10">
        <h3 class="text-xl font-semibold mb-4">Obsah košíku</h3>
        <hr class="my-4">

        @foreach ($cartItems as $item)
            <div class="bg-white p-4 rounded-lg shadow mb-4 flex justify-between items-center border border-gray-200">
                <div class="flex-grow mr-4">
                    <h5 class="text-lg font-semibold">{{ $item->product->name }}</h5>
                </div>
                <div class="flex flex-col items-center">
                    <input type="hidden" name="items[{{ $item->product->id }}][product_id]"
                        value="{{ $item->product->id }}">
                    <input type="text" name="items[{{ $item->product->id }}][quantity]"
                        value="{{ $item->quantity }}"
                        class="form-input w-20 mb-2 border border-gray-300 rounded-lg p-2 text-center" min="1"
                        max="100" readonly>
                    <span class="text-gray-500">{{ $item->product->price }} EUR/ks</span>
                </div>
            </div>
        @endforeach

        <hr class="my-4">

        <!-- Tlacidla -->
        <div class="flex justify-between items-end">

            <a href="{{ route('cart.index') }}"
                class="bg-gray-800 hover:bg-gray-900 text-white py-2 px-4 rounded-lg transition ease-in-out duration-150">Spať
                do košíku</a>


            <div class="flex flex-col items-end">
                <h4 class="text-xl font-semibold mb-2">Celková cena: {{ $totalPrice }} EUR</h4>
                <button type="submit"
                    class="bg-gray-800 hover:bg-gray-900 text-white py-2 px-4 rounded-lg transition ease-in-out duration-150">Potvrdiť
                    objednávku</button>
            </div>
        </div>
    </div>

    </form>
@endsection
