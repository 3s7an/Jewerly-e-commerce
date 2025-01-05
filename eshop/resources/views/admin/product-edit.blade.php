
@extends('admin.layout')

@section('content')

<div class="card shadow-lg border-0">
    <div class="card-header bg-primary text-white">
        <h1 class="text-center">Edit product</h1>
    </div>

    <div class="card-body">
        <form action="{{route('products.update', $product->id)}}" method="post">
            @csrf
            @method('PUT')

            <div class="container">
                <!-- Informácie o produkte -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5 class="text-muted">Product information</h5>
                        <div class="row">
                         <!-- Obrázok produktu -->
                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label">Image</label>

                        <!-- Zobrazení aktuálního obrázku, pokud existuje -->
                        @if($product->image)
                            <img src="{{ $product->getImageURL() }}" alt="Obrázok produktu" class="img-fluid mb-3" id="current-image">
                        @endif

                        <!-- Input pre nahranie noveho obrazku -->
                        <input type="file" id="image" name="image" class="form-control">
                    </div>

                            <!-- Názov produktu -->
                            <div class="col-md-6 mb-3">
                                <!-- Názov produktu -->
                                <label for="name" class="form-label">Product name</label>
                                <input type="text" id="name" name="name" class="form-control mb-4" value="{{ $product->name }}">

                                <!-- Kategória produktu -->
                                <div class="mb-4">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select id="category_id" name="category_id" class="form-select">
                                        <!-- Príklad: Dynamicky načítané možnosti kategórie -->
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Cena produktu -->
                                <div class="mb-4">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ $product->price }}">
                                </div>
                            </div>




                        </div>

                        <!-- Popis produktu -->
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <!-- Cena produktu -->
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="price" id="price" name="price" class="form-control" value="{{ $product->price }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tlačidlá -->
                <div class="d-flex justify-content-between">
                    <a class="btn btn-secondary" href="{{route('admin.product')}}">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


</form>

