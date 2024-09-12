@extends('layout')

@section('content')
@include('includes.flash-message')

<h1 class="text-center mb-4">Zhrnutie objednávky</h1>

<h3>Dodacie údaje</h3>
<hr>
<form>
    <div class="form-group">
        <label for="name">Meno:</label>
        <input type="text" id="name" class="form-control" value="{{ Auth::user()->name }}" readonly>
    </div>

    <div class="form-group">
        <label for="surname">Priezvisko:</label>
        <input type="text" id="surname" class="form-control" value="{{ Auth::user()->surname }}" readonly>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
    </div>

    <div class="form-group">
        <label for="address">Dodacia adresa:</label>
        <input type="text" id="street" class="form-control" value="{{ Auth::user()->street }}" readonly>
        <input type="text" id="zipcode" class="form-control" value="{{ Auth::user()->zipcode }}" readonly>
        <input type="text" id="city
        " class="form-control" value="{{ Auth::user()->city }}" readonly>

    </div>
</form>

<hr>
<h3 class="mt-5">Platba</h3>

<input type="radio" value="Dobierkou" id="platba" checked>
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
                <input type="number" value="{{ $item->quantity }}" class="form-control mb-2" style="width: 80px;">
                <span class="text-muted">{{ $item->product->price }} EUR/ks</span>
            </div>
        </div>
    </div>

@endforeach

<hr>

<div class="d-flex justify-content-end">
    <form action="{{route('order.index')}}" class="d-flex flex-column align-items-end">
        <h4 class="mt-3">Celková cena: {{$totalPrice}}</h4>
        <button class="btn btn-warning mt-4">Potvrdiť objednávku</button>
    </form>
</div>



@endsection
