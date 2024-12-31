@extends('layout')

@section('content')
    <div class="flex justify-center min-h-screen bg-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 rounded-lg mt-24 bg-white shadow-lg">

            <nav class="breadcrumb mb-6 text-gray-600 mt-2">
                <a href="/" class="hover:text-blue-500">Domov</a>
                @foreach ($parentCategories as $parentCategory)
                    <span class="mx-1">&gt;</span>
                    <a href="{{ route('category.view.show', $parentCategory->id) }}" class="hover:text-blue-500">
                        {{ $parentCategory->name }}
                    </a>
                @endforeach
            </nav>

            <h1 class="text-5xl text-center font-bold mb-10 text-gray-800">
                {{ $category->name }}
            </h1>

            @if ($category->children->isNotEmpty())
                <div class="flex justify-center mb-10">
                    @foreach ($category->children as $childCategory)
                        <div class="flex flex-col items-center bg-white rounded-lg shadow-md p-4 mx-4 transition-transform transform hover:scale-105">
                            <img src="{{ $childCategory->getImageURL() }}" alt="{{ $childCategory->name }}" class="w-36 h-36 rounded-full mb-2">
                            <a href="{{ route('category.view.show', $childCategory->id) }}" class="block text-center text-lg font-semibold text-gray-800 hover:text-blue-500">
                                {{ $childCategory->name }}
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif

            <hr class="mt-10 mb-6 border-gray-300">

            @if ($products->isNotEmpty())
                <h2 class="text-2xl text-center font-bold mb-4 text-gray-800">Produkty :</h2>

                <form action="{{route('category.view.show', $category->id)}}" method="get">

                <div class="relative inline-block flex justify-end">

                    <button class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500" id="dropdownButton" type="button" onclick="toggleDropdown()" aria-expanded="false">
                      Filtrovat podla
                    </button>
                    <ul class="absolute right-0 mt-12 w-48 bg-white border border-gray-300 rounded shadow-lg hidden" id="dropdownMenu" role="menu">
                      <li>
                        <button class="block px-4 py-2 text-gray-800 hover:bg-gray-100 w-full text-left" type="submit" name="price_low">
                          Najlacnejšie
                        </button>
                      </li>
                      <li>
                        <button class="block px-4 py-2 text-gray-800 hover:bg-gray-100 w-full text-left" type="submit" name="price_high">
                          Najdrahšie
                        </button>
                      </li>

                      <li>
                        <button class="block px-4 py-2 text-gray-800 hover:bg-gray-100 w-full text-left" type="submit" name="date_new">
                          Najnovšie
                        </button>
                      </li>

                      <li>
                        <button class="block px-4 py-2 text-gray-800 hover:bg-gray-100 w-full text-left" type="submit" name="date_old">
                          Najstaršie
                        </button>
                      </li>

                      <li>
                        <button class="block px-4 py-2 text-gray-800 hover:bg-gray-100 w-full text-left" type="submit" name="defualt">
                          Predvolené
                        </button>
                      </li>

                    </ul>
                  </div>

                </form>


                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        @include('includes.product-box', ['product' => $product])
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-600">Žiadne produkty nie sú k dispozícii v tejto kategórii.</p>
            @endif

        </div>
    </div>

    <script>
        function toggleDropdown() {
          const menu = document.getElementById('dropdownMenu');
          const isExpanded = menu.classList.contains('hidden');
          menu.classList.toggle('hidden', !isExpanded);
        }
      </script>
@endsection

