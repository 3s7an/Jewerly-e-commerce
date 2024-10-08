@extends('layout')

@section('content')
<div class="flex justify-center min-h-screen">
    <div class="container mx-4 sm:mx-6 lg:mx-8 rounded-lg mt-24">
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full sm:w-3/4 md:w-1/2">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mt-10" action="" method="post">
                @csrf
                <h3 class="text-center text-2xl text-gray-700 mb-6">Prihlásenie</h3>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Zadajte svoj email">
                    @error('email')
                        <span class="text-sm text-red-500 mt-2 block">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Heslo:</label>
                    <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="Zadajte svoje heslo">
                    @error('password')
                        <span class="text-sm text-red-500 mt-2 block">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <input type="submit" name="submit" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="Prihlásiť sa">
                </div>

                <div class="text-center mt-6">
                    <a href="{{route('register')}}" class="text-gray-600 hover:text-gray-900">Nemáte ešte u nás účet? Zaregistrujte sa tu</a>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</div>

@endsection

