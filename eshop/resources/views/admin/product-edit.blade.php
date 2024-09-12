@extends('admin.layout')

@section('content')
    

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
