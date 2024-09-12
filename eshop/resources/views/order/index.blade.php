@extends('layout')

@section('content')
    @include('includes.flash-message')

    <h1 class="text-center mb-4">Zhrnutie objednávky</h1>

    <h3>Dodacie údaje</h3>
    <hr>
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <!-- Dodacie údaje -->
        @if (!Auth::user()->name)
        <div class="form-group">
            <label for="name">Meno:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" >
        </div>

        <div class="form-group">
            <label for="surname">Priezvisko:</label>
            <input type="text" name="surname" id="surname" class="form-control" value="{{ Auth::user()->surname }}"
                >
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email}}"
                readonly >
        </div>

        <div class="form-group">
            <label for="address">Dodacia adresa:</label>
            <input type="text" name="street" id="street" class="form-control mb-1" value="{{ Auth::user()->street }}"
                >
            <input type="text" name="zipcode" id="zipcode" class="form-control mb-1"
                value="{{ Auth::user()->zipcode }}" readonly>
            <input type="text" name="city" id="city" class="form-control mb-1" value="{{ Auth::user()->city }}"
                >
        </div>

        @else
        <div class="form-group">
            <label for="name">Meno:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" readonly>
        </div>

        <div class="form-group">
            <label for="surname">Priezvisko:</label>
            <input type="text" name="surname" id="surname" class="form-control" value="{{ Auth::user()->surname }}"
                readonly>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}"
                readonly>
        </div>

        <div class="form-group">
            <label for="address">Dodacia adresa:</label>
            <input type="text" name="street" id="street" class="form-control mb-1" value="{{ Auth::user()->street }}"
                readonly>
            <input type="text" name="zipcode" id="zipcode" class="form-control mb-1"
                value="{{ Auth::user()->zipcode }}" readonly>
            <input type="text" name="city" id="city" class="form-control mb-1" value="{{ Auth::user()->city }}"
                readonly>
        </div>
        @endif

        <hr>
        <h3 class="mt-5">Platba</h3>
        <input type="radio" name="payment_method" value="Dobierkou" id="platba" checked>
        <label for="platba">Dobierkou</label>

        <hr>
        <h3 class="mt-5">Obsah košíku</h3>
        <hr>
        @foreach ($cartItems as $item)
            <div class="card mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column flex-grow-1 me-3">
                        <h5 class="mb-0">{{ $item->product->name }}</h5>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <input type="hidden" name="items[{{ $item->product->id }}][product_id]"
                            value="{{ $item->product->id }}">
                        <input type="number" name="items[{{ $item->product->id }}][quantity]"
                            value="{{ $item->quantity }}" class="form-control mb-2" style="width: 80px;" min="1"
                            max="100">
                        <span class="text-muted">{{ $item->product->price }} EUR/ks</span>
                    </div>
                </div>
            </div>
        @endforeach

        <hr>

        <div class="d-flex justify-content-between align-items-end">
            <!-- Tlačidlo Spať do košíku -->
            <a href="{{ route('cart.index') }}" class="btn btn-warning me-3">Spať do košíku</a>

            <!-- Celková cena a tlačidlo Potvrdiť objednávku -->
            <div class="d-flex flex-column align-items-end">
                <h4 class="mb-2">Celková cena: {{ $totalPrice }}</h4>
                <button type="submit" class="btn btn-warning">Potvrdiť objednávku</button>
            </div>
        </div>
    </form>
@endsection
