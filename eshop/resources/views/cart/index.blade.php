@extends('layout')

@section('content')
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
                        <button class="btn btn-danger btn-sm">Odstrániť</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex flex-row-reverse">
        <form action="">
            <button class="btn btn-warning mt-5">Pokračovať</button>
                </form>

</div>

@endsection
