@extends('admin.layout')

@section('content')
@include('includes.flash-message')

<h1 class="text-center mb-4 text-4xl font-bold text-gray-800">Collections</h1>


<!-- Hidden Form Toggle Container -->
<div class="form_toggle hidden mt-10"> <!-- Initially hidden form -->
    <div class="flex justify-center">
        <!-- This div is empty but can be used for further content or styling -->
    </div>
    <form action="{{ route('collections.store') }}" method="post" class="p-6 border rounded-lg shadow-lg bg-white w-1/2 mx-auto mb-5" enctype="multipart/form-data">
        @csrf



        <div class="mb-4">
            <label for="collection-img" class="block text-gray-700 font-semibold mb-2">Image:</label>
            <input type="file" name="collection-img" id="collection-img" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="">
            @error('collection-img')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>



        <div class="mb-4">
            <label for="collection-name" class="block text-gray-700 font-semibold mb-2">Name:</label>
            <input type="text" name="collection-name" id="collection-name" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="">
            @error('collection-name')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="collection-description" class="block text-gray-700 font-semibold mb-2">Description:</label>
            <textarea name="collection-description" id="collection-description" rows="4" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Enter collection description..."></textarea>

            @error('collection-description')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="products" class="block text-gray-700 font-semibold mb-2">Products:</label>
            <select name="products[]" id="products" class="choices block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" multiple>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            @error('products')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="collection-discountrate" class="block text-gray-700 font-semibold mb-2">Discount rate:</label>
            <input type="number" name="collection-discountrate" id="collection-discountrate" class="block w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="">
            @error('collection-discountrate')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="w-full bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-300">
            Add
        </button>
    </form>
</div>

<div class="flex justify-center">
    <button type="button" class="toggler bg-gray-800 text-white font-semibold py-1 px-3 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-300">
        Add c
    </button>
</div>





<!-- Table -->
<table class="min-w-full table table-hover mt-20">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Parrent id</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Parrent name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>

            <th class="px-6 py-3 text-left"></th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($collections as $collection)
        <tr>
            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $collection->id }}</td>
            <td class="px-6 py-4 text-sm text-gray-500">{{ $collection->name }}</td>

            <td class="px-6 py-4 text-sm text-gray-500">
                <div class="flex space-x-2">
                    <!-- Form to delete -->
                    <form action="{{ route('categories.destroy', $collection->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-red-500 text-white font-semibold py-1 px-3 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>

                    <!-- Form to edit -->
                    <form action="" method="GET">
                        <button type="submit" class="bg-gray-800 text-white font-semibold py-1 px-3 rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- {{ $collections->links() }} --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    var $formToggle = $('.form_toggle');
    var $toggler = $('.toggler');

    // Button text based on the initial visibility of the form
    if ($formToggle.is(':visible')) {
        $toggler.text('Hide');
    } else {
        $toggler.text('Add collection');
    }

    $toggler.click(function (e) {
        e.preventDefault();
        $formToggle.toggle();

        if ($formToggle.is(':visible')) {
            $toggler.text('Hide');
        } else {
            $toggler.text('Add collection');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
        const selectElement = document.getElementById('products');
        const choices = new Choices(selectElement, {
            removeItemButton: true,
            searchEnabled: true,
            itemSelectText: '',
            placeholder: true,
            placeholderValue: 'Choose products to collection...',
        });
    });
</script>
@endsection
