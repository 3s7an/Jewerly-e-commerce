@extends('layout')

@section('content')
<div class="container">
    <h1>Košík</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Produkt</th>
                <th>Cena</th>
                <th>Množstvo</th>
                <th>Celkom</th>
                <th>Akcie</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>
                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" />
                            <button type="submit" class="btn btn-primary">Aktualizovať</button>
                        </form>
                    </td>
                    <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Odstrániť</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
