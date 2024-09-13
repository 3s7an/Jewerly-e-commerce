@extends('admin.layout')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('admin.user.update', $user->id) }}" method="post" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('put')
        <h1 class="text-center text-2xl font-semibold mb-4">Uživatel {{ $user->email }}</h1>
        <div class="mb-4">
            <input type="text" value="{{ $user->name }}" readonly class="w-full p-2 border border-gray-300 rounded mb-2">
        </div>
        <div class="mb-4">
            <input type="text" value="{{ $user->surname }}" readonly class="w-full p-2 border border-gray-300 rounded mb-2">
        </div>
        <div class="mb-4">
            <input type="text" value="{{ $user->email }}" readonly class="w-full p-2 border border-gray-300 rounded mb-2">
        </div>
        <div class="mb-4">
            <select name="is_admin" id="is_admin" class="w-full p-2 border border-gray-300 rounded mb-2">
                @if ($user->is_admin === 0)
                    <option value="{{ $user->value }}">Nie</option>
                    <option value="1">Áno</option>
                @else
                    <option value="{{ $user->value }}">Áno</option>
                    <option value="0">Nie</option>
                @endif
            </select>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition duration-200">Uložiť</button>
    </form>
</div>

@endsection
