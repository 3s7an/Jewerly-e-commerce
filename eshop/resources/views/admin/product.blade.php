@extends('admin.layout')

@section('content')
<form action="{{ route('products.store') }}" method="post"  enctype="multipart/form-data">
    @csrf



    <div class="container mt-4">
        <h4 class="text-center mb-4">Pridať produkt :</h4>

        <div class="mb-3">
            <label for="image" class="form-label">Fotka produktu</label>
            <input class="form-control" type="file" id="product-image" name="product-image">
            @error('product-image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="product-name" class="form-label">Názov :</label>
            <input type="text" class="form-control" name="product-name" id="product-name">
            @error('product-name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="product-category" class="form-label">Kategória :</label>
            <select class="form-select" name="product-category" id="product-category">
                <option value="0" selected>Žiadna</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="product-description" class="form-label">Popis :</label>
            <textarea class="form-control" name="product-description" id="product-description" cols="30" rows="3"></textarea>
            @error('product-description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="product-price" class="form-label">Cena :</label>
            <input type="text" class="form-control" name="product-price" id="product-price">
            @error('product-price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-warning btn-sm" style="width:10%">Pridať</button>
        </div>

        <hr class="mt-4">
    </div>


</form>

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

    </div>


</form>
@endsection
