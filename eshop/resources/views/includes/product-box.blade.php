<div class="card mb-3 shadow-sm" style="width: 20%;">
    <img src="{{ $product->getImageURL() }}" class="card-img-top" alt="{{ $product->name }}">

    <div class="card-body">
        <p class="card-text text-center font-weight-bold">{{ $product->name }}</p>
    </div>

    <hr>

    <div class="card-body d-flex flex-column justify-content-between align-items-center">
        <span class="text-primary h5 mb-0">Cena: €{{ $product->price }}</span>

        
        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <div class="d-flex flex-column align-items-center">
                <button class="btn btn-warning btn-sm mt-4" type="submit" name="cart-send">Do košíku</button>
            </div>
        </form>
    </div>
</div>


