@extends('admin.layout')

@section('content')
<form action="{{route('category.store')}}" method="post">
    @csrf
    <div class="d-flex flex-column align-items-center">
        <h4>Pridať kategóriu :</h4>
        <label for="category-name">Názov kategórie:</label>
        <input type="text" name="category-name" id="category-name"></input>
        @error('category-name')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <br>

    <button type="submit" class="btn btn-primary btn-sm">Pridať</button>
    <hr>
    <table class="table table-hover">



          <tr>
            <th scope="col">Id kategorie</th>
            <th scope="col">Nazov kategorie</th>
            <th scope="col">Slug kategorie</th>
            <th scope="col">Datum vzniku kategorie</th>
            <th scope="col">Datum updatu tabulky</th>
            <th scope="col">Odstrániť</th>
          </tr>

            @foreach ($categories as $category)
            <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->slug}}</td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->updated_at}}</td>
            <td><button type="submit" class="btn btn-sm btn-danger">X</button></td>
          </tr>
          @endforeach
    </table>

    </div>
    </div>




</form>
@endsection
