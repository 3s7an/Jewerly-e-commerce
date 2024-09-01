@extends('admin.layout')

@section('content')
@include('includes.flash-message')
<form action="{{ route('category.store') }}" method="post" class="p-4 border rounded shadow-sm bg-light w-50 mx-auto mb-5">
    @csrf
    <h4 class="text-center mb-4">Pridať kategóriu</h4>

    <div class="mb-3">
        <label for="category-name" class="form-label">Názov kategórie:</label>
        <input type="text" name="category-name" id="category-name" class="form-control" placeholder="Zadajte názov kategórie">
        @error('category-name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="parent-id" class="form-label">Rodičovská kategória:</label>
        <select name="parent-id" id="parent-id" class="form-select">
            <option value="0">Žiadna</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('parent-id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary w-100">Pridať</button>
</form>
            <hr>
            <table class="table table-hover mt-5">

            </form>

                <tr>
                    <th scope="col">Id kategorie</th>
                    <th scope="col">Id rodičovskej kategorie</th>
                    <th scope="col">Nazov kategorie</th>
                    <th scope="col">Slug kategorie</th>
                    <th scope="col">Datum vzniku kategorie</th>
                    <th scope="col">Datum updatu tabulky</th>
                    <th scope="col">Odstrániť</th>
                </tr>

                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->parent_id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>

                        <td>
                            <div class="d-flex">
                              <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="btn btn-warning mx-2">
                                      <i class="fa-solid fa-trash"></i>
                                  </button>
                              </form>

                              <!-- Formulár na úpravu -->
                              <form action="" method="GET">
                                  <button type="submit" class="btn btn-warning">
                                      <i class="fa-solid fa-pen-to-square"></i>
                                  </button>
                              </form>
                            </div>
                          </td>

                    </tr>

                @endforeach


            </table>

;
            {{ $categories->links() }}














@endsection
