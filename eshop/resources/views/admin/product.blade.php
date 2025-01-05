@extends('admin.layout')

@section('content')
    @include('includes.flash-message')

    <h1 class="text-center mb-4 text-4xl font-bold text-gray-800">Products</h1>


    <!-- Hidden Form Toggle Container -->
    <div class="form_toggle hidden mt-10">
        <div class="container mt-4">
        </div>
        </form>

        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data"
            class="p-4 border rounded-lg shadow-lg bg-white w-3/4 mx-auto mt-4">
            @csrf

            <!-- Field for uploading product image -->
            <div class="mb-4">
                <label for="product-image" class="block text-gray-700 font-semibold mb-1">Image</label>
                <input
                    class="block w-full text-gray-900 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2"
                    type="file" id="product-image" name="product-image">
                @error('product-image')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Field for product name -->
            <div class="mb-4">
                <label for="product-name" class="block text-gray-700 font-semibold mb-1">Name</label>
                <input type="text"
                    class="block w-full text-gray-900 border border-gray-300 rounded-lg focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50 p-2"
                    name="product-name" id="product-name">
                @error('product-name')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Product category selection -->
            <div class="mb-4">
                <label for="product-category" class="block text-gray-700 font-semibold mb-1">Category</label>
                <select
                    class="block w-full text-gray-900 border border-gray-300 rounded-lg focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50 p-2 appearance-none bg-white" name="product-category">
                    <option value="0" selected>Žiadna</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="text-gray-900 hover:bg-gray-100 focus:bg-transparent">
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>



            <!-- Field for product description -->
            <div class="mb-4">
                <label for="product-description" class="block text-gray-700 font-semibold mb-1">Description</label>
                <textarea
                    class="block w-full text-gray-900 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2"
                    name="product-description" id="product-description" rows="3"></textarea>
                @error('product-description')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Field for product price -->
            <div class="mb-4">
                <label for="product-price" class="block text-gray-700 font-semibold mb-1">Price</label>
                <input type="text"
                    class="block w-full text-gray-900 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2"
                    name="product-price" id="product-price">
                @error('product-price')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit button -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    Add
                </button>
            </div>

            <hr class="my-6">
        </form>
    </div>

    <!-- Button to toggle form visibility -->
    <div class="flex justify-center mt-4">
        <button
            class="toggler bg-gray-800 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-300">
            Add product
        </button>
    </div>

    <!-- TABLE -->
    <table class="min-w-full table table-hover mt-10">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>

                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->category_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ Str::limit($product->description, 20) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->price }}</td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="flex space-x-2">
                            <!-- Form to delete product -->
                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="bg-red-500 text-white font-semibold py-1 px-3 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                            <!-- Form to edit product -->
                            <form action="{{ route('products.edit', $product->id) }}" method="GET">
                                <button type="submit"
                                    class="bg-gray-800 text-white font-semibold py-1 px-3 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-300">
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
                $toggler.text('Hide');
            } else {
                $toggler.text('Add product');
            }

            $toggler.click(function(e) {
                e.preventDefault();
                $formToggle.toggle();

                if ($formToggle.is(':visible')) {
                    $toggler.text('Hide');
                } else {
                    $toggler.text('Add product');
                }
            });
        });
    </script>
@endsection
