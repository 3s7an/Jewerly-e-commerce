@extends('admin.layout')

@section('content')
<form action="{{ route('products.store') }}" method="post">
    @csrf



    <div class="d-flex flex-column align-items-center">
        <h4>Pridať produkt :</h4>
        <label for="product-name">Názov produktu:</label>
            <input type="text" name="product-name" id="product-name"></input>
            @error('product-name')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <label for="product-description">Pridať produkt:</label>
            <textarea name="product-description" id="product-description" cols="30" rows="2"></textarea>
            @error('product-description')
        <span style="color: red">{{ $message }}</span>
    @enderror

    <div class="d-flex flex-column align-items-center">
        <label for="product-name">Cena</label>
            <input type="text" name="product-price" id="product-price"></input>
            @error('product-price')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <br>



            <button type="submit" class="btn btn-primary btn-sm">Pridať</button> <br>
        </div>
    </div>
    <hr>

        <table class="table table-hover">
        <tr>
            <th scope="col">Id produktu</th>
            <th scope="col">Nazov produktu</th>
            <th scope="col">Slug produktu</th>
            <th scope="col">Popis produktu</th>
            <th scope="col">Cena produktu</th>
            <th scope="col">Datum vzniku kategorie</th>
            <th scope="col">Datum updatu tabulky</th>
            <th scope="col">Odstrániť</th>
          </tr>

        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->slug}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->created_at}}</td>
            <td>{{$product->updated_at}}</td>
            <td><button type="submit" class="btn btn-sm btn-danger">X</button></td>
          </tr>
        @endforeach
        </table>

    </div>

</form>
@endsection
