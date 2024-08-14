@extends('layout')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-sm-8 col-md-6">
        <form class="form mt-5" action="{{route('register')}}" method="post">
            @csrf
            <h3 class="text-center text-dark mb-4">Registrácia</h3>

            <div class="form-group mt-3">
                <label for="email" class="text-dark">Email:</label><br>
                <input type="email" name="email" id="email" class="form-control">
                @error('email')
                <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group mt-3">
                <label for="password" class="text-dark">Heslo:</label><br>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group mt-3">
                <label for="confirm-password" class="text-dark">Potvrdit heslo:</label><br>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                @error('password_confirmation')
                <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group">
                <label for="remember-me" class="text-dark"></label><br>
                <input type="submit" name="submit" class="btn btn-dark btn-md" value="Odoslat">
            </div>
            <div class="text-right mt-2">
                <a href="{{route('login')}}" class="text-dark">Máte u nás účet? Prihláste sa tu</a>
            </div>
        </form>
    </div>
</div>

@endsection
