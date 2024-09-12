@extends('layout')

@section('content')
@include('includes.flash-message')
<h1 class="text-center mb-5">Tvoj košík</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Názov produktu</th>
                <th>Množstvo</th>
                <th>Cena</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ $item->product->price }}</td>

                    <td>
                        <form action="{{route('cart.remove', $item->id)}}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>




    <div class="d-flex justify-content-end">
        <form action="{{route('order.index')}}" class="d-flex flex-column align-items-end">
            <h4 class="mt-3">Celková cena: {{$totalPrice}}</h4>
            <button class="btn btn-warning mt-4">Pokračovať</button>
        </form>
    </div>
@endsection
