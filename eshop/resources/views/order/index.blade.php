@extends('layout')

@section('content')
    @include('includes.flash-message')

    <h1 class="text-center text-2xl font-semibold mb-6">Zhrnutie objednávky</h1>

    <h3 class="text-xl font-semibold">Dodacie údaje</h3>
    <hr class="my-4">
    <form action="{{ route('order.store') }}" method="POST">
        @csrf

        <!-- Dodacie údaje -->
        @if (!Auth::user()->name)
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Meno:</label>
            <input type="text" name="name" id="name" class="form-input mt-1 block w-full" value="{{ Auth::user()->name }}">
        </div>

        <div class="mb-4">
            <label for="surname" class="block text-sm font-medium text-gray-700">Priezvisko:</label>
            <input type="text" name="surname" id="surname" class="form-input mt-1 block w-full" value="{{ Auth::user()->surname }}">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <input type="email" name="email" id="email" class="form-input mt-1 block w-full" value="{{ Auth::user()->email }}" readonly>
        </div>

        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Dodacia adresa:</label>
            <input type="text" name="street" id="street" class="form-input mt-1 block w-full mb-2" value="{{ Auth::user()->street }}">
            <input type="text" name="zipcode" id="zipcode" class="form-input mt-1 block w-full mb-2" value="{{ Auth::user()->zipcode }}" readonly>
            <input type="text" name="city" id="city" class="form-input mt-1 block w-full" value="{{ Auth::user()->city }}">
        </div>

        @else
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Meno:</label>
            <input type="text" name="name" id="name" class="form-input mt-1 block w-full" value="{{ Auth::user()->name }}" readonly>
        </div>

        <div class="mb-4">
            <label for="surname" class="block text-sm font-medium text-gray-700">Priezvisko:</label>
            <input type="text" name="surname" id="surname" class="form-input mt-1 block w-full" value="{{ Auth::user()->surname }}" readonly>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <input type="email" name="email" id="email" class="form-input mt-1 block w-full" value="{{ Auth::user()->email }}" readonly>
        </div>

        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Dodacia adresa:</label>
            <input type="text" name="street" id="street" class="form-input mt-1 block w-full mb-2" value="{{ Auth::user()->street }}" readonly>
            <input type="text" name="zipcode" id="zipcode" class="form-input mt-1 block w-full mb-2" value="{{ Auth::user()->zipcode }}" readonly>
            <input type="text" name="city" id="city" class="form-input mt-1 block w-full" value="{{ Auth::user()->city }}" readonly>
        </div>
        @endif

        <hr class="my-4">
        <h3 class="text-xl font-semibold mt-5">Platba</h3>
        <div class="flex items-center mb-4">
            <input type="radio" name="payment_method" value="Dobierkou" id="platba" checked class="mr-2">
            <label for="platba" class="text-sm font-medium text-gray-700">Dobierkou</label>
        </div>

        <hr class="my-4">
        <h3 class="text-xl font-semibold mt-5">Obsah košíku</h3>
        <hr class="my-4">
        @foreach ($cartItems as $item)
            <div class="bg-white p-4 rounded shadow mb-4 flex justify-between items-center">
                <div class="flex-grow mr-4">
                    <h5 class="text-lg font-semibold">{{ $item->product->name }}</h5>
                </div>
                <div class="flex flex-col items-center">
                    <input type="hidden" name="items[{{ $item->product->id }}][product_id]" value="{{ $item->product->id }}">
                    <input type="text" name="items[{{ $item->product->id }}][quantity]" value="{{ $item->quantity }}" class="form-input w-20 mb-2" min="1" max="100">
                    <span class="text-gray-500">{{ $item->product->price }} EUR/ks</span>
                </div>
            </div>
        @endforeach

        <hr class="my-4">

        <div class="flex justify-between items-end">
            <!-- Tlačidlo Spať do košíku -->
            <a href="{{ route('cart.index') }}" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">Spať do košíku</a>

            <!-- Celková cena a tlačidlo Potvrdiť objednávku -->
            <div class="flex flex-col items-end">
                <h4 class="text-xl font-semibold mb-2">Celková cena: {{ $totalPrice }}</h4>
                <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">Potvrdiť objednávku</button>
            </div>
        </div>
    </form>
@endsection
