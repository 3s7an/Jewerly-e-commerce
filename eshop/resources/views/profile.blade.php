<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://bootswatch.com/5/lux/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Eshop</title>

</head>

<body>
    @include('includes.navbar')

    <div class="container py-4">

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
        <form>


            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="firstName" class="form-label">Meno:</label>
                    <input type="text" class="form-control" id="firstName" value="">
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label">Priezvisko:</label>
                    <input type="text" class="form-control" id="lastName">
                </div>
            </div>



            <div class="mb-3">
                <label for="street" class="form-label">Ulica:</label>
                <input type="text" class="form-control" id="street">
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="postalCode" class="form-label">PSČ:</label>
                    <input type="text" class="form-control" id="postalCode">
                </div>
                <div class="col-md-6">
                    <label for="city" class="form-label">Mesto:</label>
                    <input type="text" class="form-control" id="city">
                </div>
            </div>

            <button class="btn btn-primary mt-4" type="submit">Uložiť údaje</button>
        </form>
    </div>





    {{-- FOOTER WITH LINKS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>
