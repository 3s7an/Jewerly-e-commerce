<div class="card mb-3 shadow-sm" style="width: 20%;">
    <img src="{{ $product->getImageURL() }}" class="card-img-top p-3" alt="{{ $product->name }}">

    <div class="card-body">

        <a href="{{ route('products.show', $product->id)}}">
        <p class="card-text text-center font-weight-bold">{{ $product->name }}</p>
        </a>

    </div>

    <hr>

    <div class="card-body d-flex flex-column justify-content-between align-items-center">
        <span class="text-primary h5 mb-0">Cena: €{{ $product->price }}</span>

        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button class="btn btn-warning btn-sm mt-4" type="submit" name="cart-send"><i class="fa-solid fa-cart-shopping"></i> Do košíku</button>
        </form>
    </div>
</div>



