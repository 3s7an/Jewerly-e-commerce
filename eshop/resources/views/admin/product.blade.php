@extends('admin.layout')

@section('content')
<form action="{{ route('products.store') }}" method="post">
    @csrf



    <div class="d-flex flex-column align-items-center">
        <h4>Pridať produkt :</h4>
        <label for="product-name">Názov :</label>
            <input type="text" name="product-name" id="product-name"></input>
            @error('product-name')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <label for="product-category">Kategória :</label>
        <select name="product-category" id="product-category">
            <option value="0" selected>Žiadna</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>


        <label for="product-description">Popis :</label>
            <textarea name="product-description" id="product-description" cols="30" rows="2"></textarea>
            @error('product-description')
        <span style="color: red">{{ $message }}</span>
    @enderror

    <div class="d-flex flex-column align-items-center">
        <label for="product-name">Cena : </label>
            <input type="text" name="product-price" id="product-price"></input>
            @error('product-price')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <br>



            <button type="submit" class="btn btn-primary btn-sm">Pridať</button> <br>
        </div>
    </div>
    <hr>

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
            <th scope="col">Odstrániť</th>
          </tr>

        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->category_id}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->created_at}}</td>
            <td>{{$product->updated_at}}</td>
            <form action="{{route('products.destroy', $product->id)}}" method="post">
                @csrf
                @method('delete')
            <td><button type="submit" class="btn btn-sm btn-danger">X</button></td>
            </form>
          </tr>
        @endforeach
        </table>

    </div>


</form>
@endsection
