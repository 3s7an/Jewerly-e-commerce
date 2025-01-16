@extends('admin.layout')

@section('content')

<div class="card shadow-lg border-0">
    <div class="card-header bg-primary text-white">
        <h1 class="text-center">Editovať užívateľa</h1>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.user.update', $user->id) }}" method="post">
            @csrf
            @method('put')

            <div class="container">
                <!-- Informácie o užívateľovi -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5 class="text-muted">Osobné informácie</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Meno</label>
                                <input type="text" id="name" class="form-control" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="surname" class="form-label">Priezvisko</label>
                                <input type="text" id="surname" class="form-control" value="{{ $user->surname }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" id="email" class="form-control" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Oprávnenia administrátora -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h5 class="text-muted">Oprávnenia administrátora</h5>
                        <select name="is_admin" id="is_admin" class="form-select">
                            @if ($user->is_admin === 0)
                                <option value="0" selected>Nie</option>
                                <option value="1">Áno</option>
                            @else
                                <option value="1" selected>Áno</option>
                                <option value="0">Nie</option>
                            @endif
                        </select>
                    </div>
                </div>

                <!-- Tlačidlo uloženia -->
                <div class="d-flex justify-content-between">
                    <a class="btn btn-secondary" href="{{ route('admin.users') }}">
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
