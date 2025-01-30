<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- BOOTSTRAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.min.js" integrity="sha512-eHx4nbBTkIr2i0m9SANm/cczPESd0DUEcfl84JpIuutE6oDxPhXvskMR08Wmvmfx5wUpVjlWdi82G5YLvqqJdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap-grid.min.css" integrity="sha512-zDDxSlYrbKTTfup/YyljmstpX+1jwjeg15AKS/fl26gRxfpD+HMr6dfuJQzCcFtoIEjf93SuCffose5gDQOZtg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Pismo -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Raleway:wght@400;700&family=Playpen+Sans:wght@100;400;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- jQuery --}}
    @vite(['resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

<script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            lobster: ['Lobster', 'cursive'],
            raleway: ['Raleway', 'sans-serif'],
            playpen: ['Playpen Sans', 'sans-serif'] // Opravené pomenovanie
          }
        }
      }
    }
</script>

<style>
    .peer:hover ~ .star {
        color: #fbbf24; /* Tailwind yellow-400 */
    }

    /* Checked behavior: when a star is checked, all previous stars should be yellow */
    .peer-checked ~ .star {
        color: #fbbf24; /* Tailwind yellow-500 */
    }

    /* Hover behavior on individual stars */
    .peer:hover ~ .star:hover,
    .peer:hover ~ .star ~ .star:hover,
    .peer:hover ~ .star ~ .star ~ .star:hover,
    .peer:hover ~ .star ~ .star ~ .star ~ .star:hover {
        color: #fbbf24; /* Tailwind yellow-400 */
    }
</style>

<title>{{ config('app.name') }}</title>
</head>

<body class="bg-gray-100 font-playpen">



    @include('includes.navbar-search')




            @yield('content')

    {{-- FOOTER WITH LINKS --}}
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} Jewerly All rights reserved.</p>
            <div class="mt-2">
                <a href="#" class="text-gray-400 hover:text-white mx-2">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white mx-2">Terms of Service</a>
            </div>
        </div>
    </footer>


</body>
</html>

</html>

