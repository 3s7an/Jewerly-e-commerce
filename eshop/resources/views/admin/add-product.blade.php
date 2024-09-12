@extends('admin.layout')

@section('content')
@include('includes.flash-message')

<div class="container mt-4">
    <form action="{{route('admin.product')}}" method="get">
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning mb-5">Skryť</button>
        </div>
</div>

<form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light w-75 mx-auto mt-4">
    @csrf

    <!-- Nadpis formulára -->
    <h4 class="text-center mb-4">Pridať produkt</h4>

    <!-- Pole pre nahrávanie obrázku produktu -->
    <div class="mb-3">
        <label for="product-image" class="form-label">Fotka produktu</label>
        <input class="form-control" type="file" id="product-image" name="product-image">
        @error('product-image')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Pole pre názov produktu -->
    <div class="mb-3">
        <label for="product-name" class="form-label">Názov</label>
        <input type="text" class="form-control" name="product-name" id="product-name">
        @error('product-name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Výber kategórie produktu -->
    <div class="mb-3">
        <label for="product-category" class="form-label">Kategória</label>
        <select class="form-select" name="product-category" id="product-category">
            <option value="0" selected>Žiadna</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Pole pre popis produktu -->
    <div class="mb-3">
        <label for="product-description" class="form-label">Popis</label>
        <textarea class="form-control" name="product-description" id="product-description" rows="3"></textarea>
        @error('product-description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Pole pre cenu produktu -->
    <div class="mb-3">
        <label for="product-price" class="form-label">Cena</label>
        <input type="text" class="form-control" name="product-price" id="product-price">
        @error('product-price')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tlačidlo na odoslanie formulára -->
    <div class="d-grid">
        <button type="submit" class="btn btn-warning btn-lg">Pridať</button>
    </div>

    <hr class="mt-4">
</form>




<!-- TABULKA -->

<!-- Hlava tabulky -->
        <table class="table table-hover mt-5">
        <tr>
            <th scope="col">Id produktu</th>
            <th scope="col">Nazov produktu</th>
            <th scope="col">Kategoria produktu</th>
            <th scope="col">Popis produktu</th>
            <th scope="col">Cena produktu</th>
            <th scope="col">Datum vzniku kategorie</th>
            <th scope="col">Datum updatu tabulky</th>
            <th scope="col"></th>
          </tr>

<!-- Telo tabulky -->
          @foreach ($products as $product)
          <tr>
              <td>{{$product->description}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->category_id}}</td>
              <td>{{$product->description}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->created_at}}</td>
              <td>{{$product->updated_at}}</td>

              <!-- Formulár na odstránenie -->
              <td>
                <div class="d-flex">
                  <form action="{{ route('products.destroy', $product->id) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-warning mx-2">
                          <i class="fa-solid fa-trash"></i>
                      </button>
                  </form>

                  <!-- Formulár na úpravu -->
                  <form action="{{ route('products.edit', $product->id) }}" method="GET">
                      <button type="submit" class="btn btn-warning">
                          <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                  </form>
                </div>
              </td>
          </tr>
      @endforeach
        </table>
<!-- KONIEC TABULKY -->

    </div>


</form>
@endsection
