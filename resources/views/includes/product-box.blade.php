<div class="mb-3 shadow-sm bg-white rounded-lg overflow-hidden mx-4 flex flex-col w-60 h-80"> <!-- Adjusted width and height -->
    <div class="flex justify-center items-center h-1/2"> <!-- Adjusted height for image container -->
        <img src="{{ $product->getImageURL() }}" alt="{{ $product->name }}" class="w-28 h-28"> <!-- Adjusted image size -->
    </div>
    <div class="p-4 flex-1 flex flex-col justify-between">
        <a href="{{ route('products.show', $product->id) }}" class="block text-center font-bold text-sm text-gray-800 hover:text-gray-600">
            {{ $product->name }}
        </a>
        <hr class="border-t my-2">
        <div class="flex flex-col justify-between items-center mt-auto w-full">
            <span class="text-primary text-lg font-semibold mb-2">Cena: €{{ $product->price }}</span>
            <form action="{{ route('cart.add') }}" method="POST" class="w-full mt-4">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="bg-gray-800 hover:bg-gray-900 text-white font-semibold py-1 px-2 rounded-full w-full flex justify-center items-center text-xs md:text-sm lg:text-base" type="submit" name="cart-send">
                    <i class="fa-solid fa-cart-shopping mr-2"></i> Add to cart
                </button>
            </form>
        </div>
    </div>
</div>










