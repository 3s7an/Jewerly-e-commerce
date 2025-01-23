<div class="mb-6 shadow-lg bg-white rounded-xl overflow-hidden mx-4 flex flex-col w-64 h-96 transition-transform duration-300 hover:scale-105">
    <!-- Obrázok produktu (väčšina boxu) -->
    <div class="flex justify-center items-center h-3/4 bg-gray-100">
        <img src="{{ $product->getImageURL() }}" alt="{{ $product->name }}" class="w-40 h-40 object-cover">
    </div>

    <!-- Obsah produktu -->
    <div class="p-4 flex-1 flex flex-col justify-between">
        <!-- Názov produktu -->
        <a href="{{ route('products.show', $product->id) }}" class="block text-center font-bold text-sm text-gray-900 hover:text-primary transition-colors">
            {{ $product->name }}
        </a>

        <!-- Cena a tlačidlo -->
        <div class="flex flex-col justify-between items-center mt-3">
            <!-- Cena -->
            <span class="text-primary text-lg font-bold mb-3">€{{ $product->price }}</span>

            <!-- Tlačidlo "Add to Cart" -->
            <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="bg-black hover:bg-primary-dark text-white font-medium py-2 px-4 rounded-lg w-full flex justify-center items-center text-sm transition-all duration-200 shadow-md hover:shadow-lg" type="submit" name="cart-send">
                    <i class="fa-solid fa-cart-shopping mr-2"></i> Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>
