@extends('admin.layout')

@section('content')
@include('includes.flash-message')

<h1 class="text-center mb-4">Produkty</h1>
<hr class="my-6">

<!-- Hidden Form Toggle Container -->
<div class="form_toggle hidden">
    <div class="container mt-4">
    </div>
    </form>

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="p-4 border rounded-lg shadow-lg bg-white w-3/4 mx-auto mt-4">
        @csrf

        <!-- Field for uploading product image -->
        <div class="mb-4">
            <label for="product-image" class="block text-gray-700 font-semibold mb-1">Fotka produktu</label>
            <input class="block w-full text-gray-900 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2" type="file" id="product-image" name="product-image">
            @error('product-image')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Field for product name -->
        <div class="mb-4">
            <label for="product-name" class="block text-gray-700 font-semibold mb-1">Názov</label>
            <input type="text" class="block w-full text-gray-900 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2" name="product-name" id="product-name">
            @error('product-name')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Product category selection -->
        <div class="mb-4">
            <label for="product-category" class="block text-gray-700 font-semibold mb-1">Kategória</label>
            <select class="block w-full text-gray-900 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2" name="product-category" id="product-category">
                <option value="0" selected>Žiadna</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Field for product description -->
        <div class="mb-4">
            <label for="product-description" class="block text-gray-700 font-semibold mb-1">Popis</label>
            <textarea class="block w-full text-gray-900 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2" name="product-description" id="product-description" rows="3"></textarea>
            @error('product-description')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Field for product price -->
        <div class="mb-4">
            <label for="product-price" class="block text-gray-700 font-semibold mb-1">Cena</label>
            <input type="text" class="block w-full text-gray-900 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2" name="product-price" id="product-price">
            @error('product-price')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit button -->
        <div class="mt-6">
            <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                Pridať
            </button>
        </div>

        <hr class="my-6">
    </form>
</div>

<!-- Button to toggle form visibility -->
<div class="flex justify-center mt-4">
    <button class="toggler bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
        Pridaj produkt
    </button>
</div>

<!-- TABLE -->
<table class="min-w-full divide-y divide-gray-200 mt-8">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id produktu</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nazov produktu</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategoria produktu</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Popis produktu</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cena produktu</th>

            <th class="px-6 py-3"></th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($products as $product)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->id }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->category_id }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{  Str::limit($product->description, 20) }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->price }}</td>

            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <div class="flex space-x-2">
                    <!-- Form to delete product -->
                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-red-500 text-white font-semibold py-1 px-3 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>

                    <!-- Form to edit product -->
                    <form action="{{ route('products.edit', $product->id) }}" method="GET">
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
<!-- END OF TABLE -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        var $formToggle = $('.form_toggle');
        var $toggler = $('.toggler');

        // Button text based on the initial visibility of the form
        if ($formToggle.is(':visible')) {
            $toggler.text('Skryť');
        } else {
            $toggler.text('Pridať produkt');
        }

        $toggler.click(function (e) {
            e.preventDefault();
            $formToggle.toggle();

            if ($formToggle.is(':visible')) {
                $toggler.text('Skryť');
            } else {
                $toggler.text('Pridať produkt');
            }
        });
    });
</script>
@endsection

