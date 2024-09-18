<div class="w-64 bg-white-800 text-black p-3 flex flex-col h-screen border">
    <h2 class="text-center text-xl font-semibold mb-4">Kategórie</h2>
    <hr class="mb-4 border-gray-600">
    <ul class="space-y-2 flex-grow overflow-y-auto">
        @foreach($categories as $category)
            <li>
                <a href="#" class="block px-3 py-2 rounded hover:bg-gray-700"><i class="fa-solid fa-chevron-down ml-2"></i> {{ $category->name }}</a>

                @if($category->children->isNotEmpty())
                    <ul class="ml-4 mt-2 space-y-1">
                        @foreach($category->children as $childCategory)
                            @include('components.category-item', ['category' => $childCategory])
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>


