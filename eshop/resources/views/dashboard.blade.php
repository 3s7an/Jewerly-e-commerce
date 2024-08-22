@extends('layout')

@section('content')

<h2 class="text-center mb-4">Produkty :</h2></h2>
<div class="d-flex">


@foreach ($products as $product)

<div class="card mb-3 shadow-sm" style="width: 20%;">
    <!-- Obrázok produktu -->
    <img src="{{$product->getImageURL()}}" class="card-img-top" alt="{{$product->name}}">

    <!-- Telo karty -->
    <div class="card-body">
        <!-- Názov produktu -->
        <p class="card-text text-center font-weight-bold">{{$product->name}}</p>
    </div>

    <hr>

    <!-- Cena a tlačidlo -->
    <div class="card-body d-flex justify-content-between align-items-center">
        <span class="text-primary h5 mb-0">Cena: €{{$product->price}}</span>
        <a href="#" class="btn btn-outline-primary">Do košíku</a>
    </div>
</div>


    @endforeach
  </div>

  @endsection

