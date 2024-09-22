@extends('admin.layout')

@section('content')
@include('includes.flash-message')

<h1 class="text-center mb-4">Kategórie</h1>
<hr class="my-6">

<!-- Hidden Form Toggle Container -->
<div class="form_toggle hidden"> <!-- Initially hidden form -->
    <div class="flex justify-center">
        <!-- This div is empty but can be used for further content or styling -->
    </div>
    <form action="{{ route('category.store') }}" method="post" class="p-6 border rounded-lg shadow-lg bg-white w-1/2 mx-auto mb-5">
        @csrf
        <h4 class="text-center text-lg font-semibold mb-4">Pridať kategóriu</h4>

        <div class="mb-4">
            <label for="category-name" class="block text-gray-700 font-semibold mb-2">Názov kategórie:</label>
            <input type="text" name="category-name" id="category-name" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Zadajte názov kategórie">
            @error('category-name')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="parent-id" class="block text-gray-700 font-semibold mb-2">Rodičovská kategória:</label>
            <select name="parent-id" id="parent-id" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="0">Žiadna</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('parent-id')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
            Pridať
        </button>
    </form>
</div>

<div class="flex justify-center">
    <button type="button" class="toggler bg-blue-500 text-white font-semibold py-1 px-3 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
        Pridať kategóriu
    </button>
</div>



<!-- Table -->
<table class="min-w-full divide-y divide-gray-200 mt-5">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id kategorie</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id rodičovskej kategorie</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nazov kategorie</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug kategorie</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Datum vzniku kategorie</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Datum updatu tabulky</th>
            <th class="px-6 py-3 text-left"></th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($categories as $category)
        <tr>
            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $category->id }}</td>
            <td class="px-6 py-4 text-sm text-gray-500">{{ $category->parent_id }}</td>
            <td class="px-6 py-4 text-sm text-gray-500">{{ $category->name }}</td>
            <td class="px-6 py-4 text-sm text-gray-500">{{ $category->slug }}</td>
            <td class="px-6 py-4 text-sm text-gray-500">{{ $category->created_at }}</td>
            <td class="px-6 py-4 text-sm text-gray-500">{{ $category->updated_at }}</td>
            <td class="px-6 py-4 text-sm text-gray-500">
                <div class="flex space-x-2">
                    <!-- Form to delete category -->
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-red-500 text-white font-semibold py-1 px-3 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>

                    <!-- Form to edit category -->
                    <form action="" method="GET">
                        <button type="submit" class="bg-blue-500 text-white font-semibold py-1 px-3 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $categories->links() }}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    var $formToggle = $('.form_toggle');
    var $toggler = $('.toggler');

    // Button text based on the initial visibility of the form
    if ($formToggle.is(':visible')) {
        $toggler.text('Skryť');
    } else {
        $toggler.text('Pridať kategóriu');
    }

    $toggler.click(function (e) {
        e.preventDefault();
        $formToggle.toggle();

        if ($formToggle.is(':visible')) {
            $toggler.text('Skryť');
        } else {
            $toggler.text('Pridať kategóriu');
        }
    });
});
</script>
@endsection
