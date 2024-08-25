@extends('layout')

@section('content')
<h1 class="text-center"> Obsah košiku </h1>

<table>

    <tr>
        <th>Produkt</th>
        <th>Množstvo</th>
        <th>Cena</th>
    </tr>

    <tr>
        <td>Naramok</td>
        <td>1</td>
        <td>12.99</td>
    </tr>


</table>

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Váš Košík</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($cartItems->isEmpty())
        <p>Váš košík je prázdny.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Produkt</th>
                    <th>Cena</th>
                    <th>Množstvo</th>
                    <th>Celková cena</th>
                    <th>Akcie</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>€{{ number_format($item->product->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>€{{ number_format($item->product->price * $item->quantity, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Odstrániť</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            <h3>Celková cena: €{{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</h3>
        </div>
    @endif
</div>


@endsection
