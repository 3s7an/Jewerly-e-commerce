@extends('admin.layout')

@section('content')
    @include('includes.flash-message')


    <table class="table table-hover mt-5">



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

    <hr>

    {{ $categories->links() }}

    <form action="{{route('admin.intercategory')}}" method="get">
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-warning">Pridat kategóriu</button>
        </div>
        </form>

    </form>
@endsection
