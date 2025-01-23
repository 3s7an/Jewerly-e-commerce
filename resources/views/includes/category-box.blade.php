<div class="relative w-48 h-48 bg-gray-100 rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-xl">
    <!-- Obrázok kategórie -->
    <img src="{{ $category->getImageURL() }}" alt="category image" class="w-full h-full object-cover">

    <!-- Text cez obrázok -->
    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center transition-opacity duration-300 hover:bg-opacity-50">
        <a href="{{ route('category.view.show', $category->id) }}" class="text-white text-lg font-bold text-center hover:underline">
            {{ $category->name }}
        </a>
    </div>
</div>
