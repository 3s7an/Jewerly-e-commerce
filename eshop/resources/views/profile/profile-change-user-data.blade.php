@extends('profile.layout')

@section('content')

<h2 class="text-center">Prihlasovacie údaje</h2>


<div class="form-group mt-3">
        <label for="email" class="text-dark">Email:</label><br>
        <input type="email" name="email" id="email" class="form-control" value="{{Auth::user()->email}}">
        @error('email')
        <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
    @enderror
    </div>
    <div class="form-group mt-3">
        <label for="password" class="text-dark">Heslo:</label><br>
        <input type="password" name="password" id="password" class="form-control" value="{{Auth::user()->password}}">
        @error('password')
        <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
    @enderror
    </div>

    <button class="btn btn-primary mt-4" type="submit">Zmeniť heslo</button>





<h2 class="text-center mt-4 mb-4">Kontaktné údaje</h2>
<form method="post" action="{{ route('profile.update', Auth::user()->id ) }}">
    @csrf
        @method('put')


    <div class="row mb-3">
        <div class="col-md-6">
            <label for="firstName" class="form-label">Meno:</label>
            <input type="text" class="form-control" id="firstName" value="" name="firstName" >
            @error('firstName')
            <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
        @enderror
        </div>
        <div class="col-md-6">
            <label for="lastName" class="form-label">Priezvisko:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" >
            @error('lastName')
            <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
        @enderror
        </div>
    </div>



    <div class="mb-3">
        <label for="street" class="form-label">Ulica:</label>
        <input type="text" class="form-control" id="street" name="street">
        @error('street')
        <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
    @enderror
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="postalCode" class="form-label">PSČ:</label>
            <input type="text" class="form-control" id="postalCode" name="postalCode" >
            @error('postalCode')
            <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
        @enderror
        </div>
        <div class="col-md-6">
            <label for="city" class="form-label">Mesto:</label>
            <input type="text" class="form-control" id="city" name="city" >
            @error('city')
            <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
        @enderror
        </div>
    </div>

    <button class="btn btn-primary mt-4" type="submit">Uložiť údaje</button>
</form>
</div>

@endsection
