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
        <form method="get" action="{{ route('profile.edit', Auth::user()->id ) }}">
            @csrf



            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="firstName" class="form-label">Meno:</label>
                    <input type="text" class="form-control" id="firstName" value="{{Auth::user()->name}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label">Priezvisko:</label>
                    <input type="text" class="form-control" id="lastName" value="{{Auth::user()->surname}}" readonly>
                </div>
            </div>



            <div class="mb-3">
                <label for="street" class="form-label">Ulica:</label>
                <input type="text" class="form-control" id="street" value="{{Auth::user()->street}}"readonly>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="postalCode" class="form-label">PSČ:</label>
                    <input type="text" class="form-control" id="postalCode" value="{{Auth::user()->zipcode}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="city" class="form-label">Mesto:</label>
                    <input type="text" class="form-control" id="city" value="{{Auth::user()->city}}" readonly>
                </div>
            </div>

            <button class="btn btn-primary mt-4" type="submit">Zmeniť údaje</button>
        </form>
    </div>

    @endsection



