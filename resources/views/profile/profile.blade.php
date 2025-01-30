@extends('layout')

@section('content')
@include('includes.flash-message')

<div class="flex justify-center min-h-screen">
    <div class="container mx-4 sm:mx-6 lg:mx-8 rounded-lg mt-20">

<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row md:space-x-8">

        <!-- Sekcia pre login -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6 md:mb-0 max-w-2xl flex-1 flex flex-col border border-gray-200">
            <h2 class="text-2xl font-semibold text-center mb-6">Login</h2>

            <div class="flex-grow">
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email :</label>
                    <input type="email" name="email" id="emailjedna" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="{{ Auth::user()->email }}" readonly>
                    @error('email')
                        <span class="block text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password :</label>
                    <input type="password" name="password" id="password" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="{{ Auth::user()->password }}" readonly>
                    @error('password')
                        <span class="block text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button class="bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2 mt-auto" type="submit">Zmeniť heslo</button> <!-- Pridaný mt-auto -->
        </div>

        <!-- Kontaktné informácie sekcia -->
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-2xl flex-1 border border-gray-200 flex flex-col">
            <h2 class="text-2xl font-semibold text-center mb-6">Contact informations</h2>

            <form method="get" action="" class="flex-grow">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="firstName" class="block text-gray-700 font-medium mb-2">Name :</label>
                        <input type="text" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="firstName" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div>
                        <label for="lastName" class="block text-gray-700 font-medium mb-2">Surname :</label>
                        <input type="text" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="lastName" value="{{ Auth::user()->surname }}" readonly>
                    </div>
                </div>

                <label for="email" class="block text-gray-700 font-medium mb-2">Email :</label>
                    <input type="email" name="email" id="email" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="{{ Auth::user()->email }}" readonly>

                <div class="mb-6">
                    <label for="street" class="block text-gray-700 font-medium mb-2">Street :</label>
                    <input type="text" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="street" value="{{ Auth::user()->street }}" readonly>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="postalCode" class="block text-gray-700 font-medium mb-2">Zipcode :</label>
                        <input type="text" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="postalCode" value="{{ Auth::user()->zipcode }}" readonly>
                    </div>
                    <div>
                        <label for="city" class="block text-gray-700 font-medium mb-2">City :</label>
                        <input type="text" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="city" value="{{ Auth::user()->city }}" readonly>
                    </div>
                </div>

                <button class="bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2 w-full mt-auto contact-button" type="submit">Change informations</button>

                <div class="buttons hidden">
                    <button class="bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2  mt-auto back-button" type="submit">Back</button>
                    <button class="bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2  mt-auto save-button" type="submit">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>

    </div>
</div>



@endsection

