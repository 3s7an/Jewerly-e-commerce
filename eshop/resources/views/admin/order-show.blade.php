@extends('admin.layout')

@section('content')
@include('includes.flash-message')

<h1 class="text-center my-4">Objednávka číslo {{$order->order_number}}</h1>

<form action="{{route('admin.order.update', $order->id)}}" method="post">
    @method('put')
    @csrf
<div class="d-flex justify-content-center">
    <div class="container col-md-6">
        <div class="row mb-3">
            <div class="col-12">
                <input type="text" class="form-control mb-2" value="{{$order->user->name}}" placeholder="Meno" readonly>
                <input type="text" class="form-control mb-2" value="{{$order->user->surname}}" placeholder="Priezvisko" readonly>
                <input type="email" class="form-control mb-2" value="{{$order->user->email}}" placeholder="Email" readonly>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                @foreach ($order->items as $item)
                    <input type="text" class="form-control mb-2" value="{{$item->quantity}} x {{$item->product->name}}" readonly>
                @endforeach
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <input type="text" class="form-control" value="{{$order->total_price}} EUR" readonly>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <select class="form-select" name="status">
                    <option value="spracovava sa">Spracováva sa</option>
                    <option value="odoslana">Odoslaná</option>
                    <option value="prijata">Prijatá</option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a class="btn btn-warning" href="{{route('admin.orders')}}">Spať</a>
            <button type="submit" class="btn btn-warning">Ulozit</button>

        </form>

        </div>
    </div>
</div>







@endsection
