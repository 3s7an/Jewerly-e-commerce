@extends('layout')

@section('content')

<h2 class="text-center mb-4">Produkty :</h2></h2>
<div class="d-flex">


@foreach ($products as $product)

<div class="card mb-3" style="width: 20%">

    <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
      <rect width="100%" height="100%" fill="#868e96"></rect>
      <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Obrázok produktu</text>
    </svg>
    <div class="card-body">
      <p class="card-text">{{$product->name}}</p>
    </div>
    <hr>

    <div class="card-body">
      <span>Cena : {{$product->price}}</span>
      <br>
      <a href="#" class="card-link">Do košíku</a>
    </div>

  </div>


    @endforeach
  </div>

  @endsection

