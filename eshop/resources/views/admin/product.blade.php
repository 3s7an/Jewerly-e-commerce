@extends('admin.layout')

@section('content')
@include('includes.flash-message')

<div class="container mt-4">
    <form action="{{route('admin.add-product')}}" method="get">
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning mb-5">Pridať produkt</button>
        </div>
</div>





<!-- TABULKA -->

<!-- Hlava tabulky -->
        <table class="table table-hover">
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
              <td>{{$product->id}}</td>
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
