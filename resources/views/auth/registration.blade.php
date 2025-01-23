@extends('layout')

@section('content')
<div class="flex justify-center min-h-screen">
    <div class="container mx-4 sm:mx-6 lg:mx-8 rounded-lg mt-24">

<div class="flex justify-center mt-10">
    <div class="w-full sm:w-3/4 md:w-1/2">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8" action="{{route('register')}}" method="post">
            @csrf
            <h3 class="text-center text-2xl text-gray-700 mb-6">Registrácia</h3>

            <!-- Email input -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Your email email">
                @error('email')
                    <span class="text-sm text-red-500 mt-2 block">{{$message}}</span>
                @enderror
            </div>

            <!-- Password input -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Your password">
                @error('password')
                    <span class="text-sm text-red-500 mt-2 block">{{$message}}</span>
                @enderror
            </div>

            <!-- Confirm Password input -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm password :</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('password_confirmation')
                    <span class="text-sm text-red-500 mt-2 block">{{$message}}</span>
                @enderror
            </div>

            <!-- Submit button -->
            <div class="flex items-center justify-between">
                <input type="submit" name="submit" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="Send">
            </div>

            <!-- Login link -->
            <div class="text-center mt-6">
                <a href="{{route('login')}}" class="text-gray-600 hover:text-gray-900">Already registered? Login here</a>
            </div>
        </form>
    </div>
</div>
    </div>
</div>

@endsection

