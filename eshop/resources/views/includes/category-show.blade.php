    @extends('layout')

    @section('content')
        <div class="flex justify-center min-h-screen">
            <div class="container mx-4 sm:mx-6 lg:mx-8 rounded-lg mt-20">

                <nav class="breadcrumb mb-20">
                    <a href="/">Domov ></a>
                    @foreach ($parentCategories as $parentCategory)
                        <a href="{{ route('category.view.show', $parentCategory->id) }}" class="mt-10">
                            {{ $parentCategory->name }}
                        </a>
                        @if (!$loop->last)
                            &gt;
                        @endif
                    @endforeach
                </nav>

                <h1 class="text-5xl text-center mb-20">
                    {{ $category->name }}
                </h1>



                @if ($category->children->isNotEmpty())
                    <div class="flex justify-center">
                        @foreach ($category->children as $childCategory)
                            <div class="flex flex-col card max-w-sm bg-white rounded-lg shadow-md overflow-hidden mx-10">
                                <img src="{{ $childCategory->getImageURL() }}" alt="" class="w-36 h-36">
                                <a href="{{ route('category.view.show', $childCategory->id) }}"
                                    class="block text-center text-lg font-semibold text-gray-800 hover:text-blue-500 mx-2">{{ $childCategory->name }}</a>
                                <input type="hidden" name="" value="{{ $childCategory->id }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                <hr class="mt-20 mb-20">
                @if ($products->isNotEmpty())
                    <div class="flex">
                        @foreach ($products as $product)
                            @include('includes.product-box')
                        @endforeach
                    </div>
                @else
                    <p class="text-center">No products available in this category.</p>
                @endif

            </div>
        </div>

    @endsection
