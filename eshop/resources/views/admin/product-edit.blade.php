@extends('admin.layout')

@section('content')
    <div class="container mt-4">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light w-75 mx-auto">
            @csrf
            <h4 class="text-center mb-4">Pridať produkt</h4>

            <div class="mb-3">
                <label for="product-image" class="form-label">Fotka produktu</label>
                <input class="form-control" type="file" id="product-image" name="product-image">
                @error('product-image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product-name" class="form-label">Názov</label>
                <input type="text" class="form-control" name="product-name" id="product-name">
                @error('product-name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product-category" class="form-label">Kategória</label>
                <select class="form-select" name="product-category" id="product-category">
                    <option value="0" selected>Žiadna</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="product-description" class="form-label">Popis</label>
                <textarea class="form-control" name="product-description" id="product-description" cols="30" rows="3"></textarea>
                @error('product-description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="product-price" class="form-label">Cena</label>
                <input type="text" class="form-control" name="product-price" id="product-price">
                @error('product-price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-warning">Pridať</button>
            </div>

            <hr class="mt-4">
        </form>
    </div>

            <!-- TABULKA -->

            <!-- Hlavicka tabulky -->
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
              <td><textarea name="product-name" id="description" cols="10" rows="5" class="form-control">{{$product->name}}</textarea></td>
              <td>{{$product->category_id}}</td>
              <td><textarea name="product-description" id="description" cols="10" rows="5" class="form-control">{{$product->description}}</textarea></td>
              <td><textarea name="product-price" id="description" cols="10" rows="5" class="form-control">{{$product->price}}</textarea></td>
              <td>{{$product->created_at}}</td>
              <td>{{$product->updated_at}}</td>

              <!-- Formulár na odstránenie -->
              <td>
                <div class="d-flex">
                  <form action="" method="post">

                      <button type="submit" class="btn btn-warning mx-2">
                          spat
                      </button>
                  </form>

                  <!-- Formulár na úpravu -->
                  <form action="" method="GET">
                      <button type="submit" class="btn btn-warning">
                          ulozit
                      </button>
                  </form>
              </td>
            </div>
          </tr>
      @endforeach

        </table>
        <!-- KONIEC TABULKY -->

    </div>


</form>
@endsection
