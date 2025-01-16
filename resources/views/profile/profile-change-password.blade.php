@extends('profile.layout')

@section('content')

<h2 class="text-center">Login </h2>


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

    <button class="btn btn-primary mt-4" type="submit">Change password</button>





<h2 class="text-center mt-4 mb-4">Contact details</h2>
<form method="get" action="{{ route('profile.edit', Auth::user()->id ) }}">


    <div class="row mb-3">
        <div class="col-md-6">
            <label for="firstName" class="form-label">Name :</label>
            <input type="text" class="form-control" id="firstName" value="" readonly>
        </div>
        <div class="col-md-6">
            <label for="lastName" class="form-label">Surname :</label>
            <input type="text" class="form-control" id="lastName" readonly>
        </div>
    </div>



    <div class="mb-3">
        <label for="street" class="form-label">Street :</label>
        <input type="text" class="form-control" id="street" readonly>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="postalCode" class="form-label">Zipcode :</label>
            <input type="text" class="form-control" id="postalCode" readonly>
        </div>
        <div class="col-md-6">
            <label for="city" class="form-label">City :</label>
            <input type="text" class="form-control" id="city" readonly>
        </div>
    </div>

    <button class="btn btn-primary mt-4" type="submit">Change details</button>
</form>
</div>

@endsection
