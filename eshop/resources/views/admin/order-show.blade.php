@extends('admin.layout')

@section('content')
@include('includes.flash-message')

<div class="card shadow-lg border-0">
    <div class="card-header bg-primary text-white">
        <h1 class="text-center">Order number {{$order->order_number}}</h1>
    </div>

    <div class="card-body">
        <form action="{{route('admin.order.update', $order->id)}}" method="post">
            @method('put')
            @csrf

            <div class="container">
                <!-- Zákazník Informácie -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5 class="text-muted">User info </h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" class="form-control" value="{{$order->user->name}}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="surname" class="form-label">Surname</label>
                                <input type="text" id="surname" class="form-control" value="{{$order->user->surname}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" value="{{$order->user->email}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Položky objednávky -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5 class="text-muted">Order items</h5>
                        @foreach ($order->items as $item)
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" value="{{$item->quantity}} x {{$item->product->name}}" readonly>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Celková cena -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5 class="text-muted">Total price</h5>
                        <input type="text" class="form-control" value="{{$order->total_price}} EUR" readonly>
                    </div>
                </div>

                <!-- Stav objednávky -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5 class="text-muted">Order status</h5>
                        <select class="form-select" name="status">
                            <option value="spracovava sa" {{ $order->status == 'spracovava sa' ? 'selected' : '' }}>Spracováva sa</option>
                            <option value="odoslana" {{ $order->status == 'odoslana' ? 'selected' : '' }}>Odoslaná</option>
                            <option value="prijata" {{ $order->status == 'prijata' ? 'selected' : '' }}>Prijatá</option>
                        </select>
                    </div>
                </div>

                <!-- Tlačidlá -->
                <div class="d-flex justify-content-between">
                    <a class="btn btn-secondary" href="{{route('admin.orders')}}">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
