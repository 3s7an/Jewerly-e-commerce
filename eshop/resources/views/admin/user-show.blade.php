@extends('admin.layout')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('admin.user.update', $user->id) }}" method="post" class="max-w-md w-full bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('put')
        <h1 class="text-center text-2xl font-semibold mb-6">Editovať uživateľa</h1>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Meno:</label>
            <input type="text" value="{{ $user->name }}" readonly class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" id="name">
        </div>

        <div class="mb-4">
            <label for="surname" class="block text-gray-700 font-medium mb-2">Priezvisko:</label>
            <input type="text" value="{{ $user->surname }}" readonly class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" id="surname">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
            <input type="text" value="{{ $user->email }}" readonly class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" id="email">
        </div>

        <div class="mb-6">
           <label for="is_admin" class="block text-gray-700 font-medium mb-2">Oprávnenia administrátora:</label>
            <select name="is_admin" id="is_admin" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                @if ($user->is_admin === 0)
                    <option value="{{ $user->value }}">Nie</option>
                    <option value="1">Áno</option>
                @else
                    <option value="{{ $user->value }}">Áno</option>
                    <option value="0">Nie</option>
                @endif
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 transition duration-200">Uložiť</button>
    </form>
</div>

@endsection
