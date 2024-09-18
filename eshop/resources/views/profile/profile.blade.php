@extends('profile.layout')

@section('content')
@include('includes.flash-message')

<div class="container mx-auto px-4 py-8">
    <!-- Login Information Section -->
    <h2 class="text-2xl font-semibold text-center mb-6">Prihlasovacie údaje</h2>

    <div class="mb-6">
        <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
        <input type="email" name="email" id="email" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="{{ Auth::user()->email }}" readonly>
        @error('email')
            <span class="block text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-6">
        <label for="password" class="block text-gray-700 font-medium mb-2">Heslo:</label>
        <input type="password" name="password" id="password" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="{{ Auth::user()->password }}" readonly>
        @error('password')
            <span class="block text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
    </div>

    <button class="bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-300" type="submit">Zmeniť heslo</button>

    <!-- Contact Information Section -->
    <h2 class="text-2xl font-semibold text-center mt-8 mb-6">Kontaktné údaje</h2>

    <form method="get" action="{{ route('profile.edit', Auth::user()->id) }}">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="firstName" class="block text-gray-700 font-medium mb-2">Meno:</label>
                <input type="text" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="firstName" value="{{ Auth::user()->name }}" readonly>
            </div>
            <div>
                <label for="lastName" class="block text-gray-700 font-medium mb-2">Priezvisko:</label>
                <input type="text" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="lastName" value="{{ Auth::user()->surname }}" readonly>
            </div>
        </div>

        <div class="mb-6">
            <label for="street" class="block text-gray-700 font-medium mb-2">Ulica:</label>
            <input type="text" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="street" value="{{ Auth::user()->street }}" readonly>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="postalCode" class="block text-gray-700 font-medium mb-2">PSČ:</label>
                <input type="text" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="postalCode" value="{{ Auth::user()->zipcode }}" readonly>
            </div>
            <div>
                <label for="city" class="block text-gray-700 font-medium mb-2">Mesto:</label>
                <input type="text" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="city" value="{{ Auth::user()->city }}" readonly>
            </div>
        </div>

        <button class="bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-300" type="submit">Zmeniť údaje</button>
    </form>
</div>
@endsection
