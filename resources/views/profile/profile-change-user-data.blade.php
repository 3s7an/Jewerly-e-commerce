@extends('profile.layout')

@section('content')

<h2 class="text-center">Login</h2>


<div class="form-group mt-3">
        <label for="email" class="text-dark">Email:</label><br>
        <input type="email" name="email" id="email" class="form-control" value="{{Auth::user()->email}}">
        @error('email')
        <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
    @enderror
    </div>
    <div class="form-group mt-3">
        <label for="password" class="text-dark">Password:</label><br>
        <input type="password" name="password" id="password" class="form-control" value="{{Auth::user()->password}}">
        @error('password')
        <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
    @enderror
    </div>

    <button class="btn btn-warning mt-4" type="submit">Change password</button>





<h2 class="text-center mt-4 mb-4">Contact Information</h2>
<form method="post" action="{{ route('profile.update', Auth::user()->id ) }}">
    @csrf
        @method('put')


    <div class="row mb-3">
        <div class="col-md-6">
            <label for="firstName" class="form-label">Name :</label>
            <input type="text" class="form-control" id="firstName" value="{{Auth::user()->name}}" name="firstName" >
            @error('firstName')
            <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
        @enderror
        </div>
        <div class="col-md-6">
            <label for="lastName" class="form-label">Surname :</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="{{Auth::user()->surname}}" >
            @error('lastName')
            <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
        @enderror
        </div>
    </div>



    <div class="mb-3">
        <label for="street" class="form-label">Street :</label>
        <input type="text" class="form-control" id="street" name="street" value="{{Auth::user()->street}}">
        @error('street')
        <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
    @enderror
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="postalCode" class="form-label">Zip code :</label>
            <input type="text" class="form-control" id="postalCode" name="postalCode" value="{{Auth::user()->zipcode}}" >
            @error('postalCode')
            <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
        @enderror
        </div>
        <div class="col-md-6">
            <label for="city" class="form-label">City :</label>
            <input type="text" class="form-control" id="city" name="city" value="{{Auth::user()->city}}" >
            @error('city')
            <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
        @enderror
        </div>
    </div>

    <button class="btn btn-warning mt-4" type="submit">Save</button>
</form>
</div>

@endsection
