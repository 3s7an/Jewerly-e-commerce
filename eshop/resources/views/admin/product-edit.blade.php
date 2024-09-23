



@extends('admin.layout')

@section('content')

<div class="card shadow-lg border-0">
    <div class="card-header bg-primary text-white">
        <h1 class="text-center">Editovať produkt</h1>
    </div>

    <div class="card-body">
        <form action="" method="post">
            @csrf
            @method('put')

            <div class="container">
                <!-- Informácie o produkte -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5 class="text-muted">Informácie o produkte</h5>
                        <div class="row">
                            <!-- Názov produktu -->
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Názov produktu</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}">
                            </div>

                            <!-- Kategória produktu -->
                            <div class="col-md-6 mb-3">
                                <label for="category_id" class="form-label">Kategória</label>
                                <select id="category_id" name="category_id" class="form-select">
                                    <!-- Vybraná kategória -->
                                    <option value="{{ $product->category_id }}"></option>
                                    <!-- Ostatné kategórie môžu byť dynamicky pridané -->
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Popis produktu -->
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Popis produktu</label>
                                <textarea id="description" name="description" class="form-control">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <!-- Cena produktu -->
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="price" class="form-label">Cena</label>
                                <input type="text" id="price" name="price" class="form-control" value="{{ $product->price }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tlačidlá -->
                <div class="d-flex justify-content-between">
                    <a class="btn btn-secondary" href="">
                        <i class="fas fa-arrow-left"></i> Spať
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Uložiť
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


</form>

