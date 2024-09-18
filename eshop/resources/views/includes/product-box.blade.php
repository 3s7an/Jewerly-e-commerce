<div class="w-1/5 mb-3 shadow-sm bg-white rounded-lg overflow-hidden mx-4">
    <img src="{{ $product->getImageURL() }}" alt="{{ $product->name }}" class="w-full p-3">

    <div class="p-4">
        <a href="{{ route('products.show', $product->id)}}" class="block text-center font-bold text-sm text-gray-800 hover:text-gray-600">
            {{ $product->name }}
        </a>
    </div>

    <hr class="border-t">

    <div class="p-4 flex flex-col justify-between items-center">
        <span class="text-primary text-lg font-semibold mb-0">Cena: €{{ $product->price }}</span>

        <form action="{{ route('cart.add') }}" method="POST" class="w-full mt-4">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button class="bg-gray-800 hover:bg-gray-900 text-white font-semibold py-2 px-4 rounded-full w-full flex justify-center items-center" type="submit" name="cart-send">
                <i class="fa-solid fa-cart-shopping mr-2"></i> Do košíku
            </button>
        </form>
    </div>
</div>




