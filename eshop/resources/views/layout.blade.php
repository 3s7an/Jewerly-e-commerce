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

    <!-- Pismo -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Raleway:wght@400;700&display=swap" rel="stylesheet">

    <!-- Tailwind custom config to add Lobster font -->
    <script>
        tailwind.config = {
          theme: {
            extend: {
              fontFamily: {
                lobster: ['Lobster', 'cursive'],
                raleway: ['Raleway', 'sans-serif'],
              }
            }
          }
        }
      </script>


    <title>Eshop</title>
</head>

<body class="bg-white-100 font-serif">

    @include('includes.navbar-search')

    <div class="flex justify-center min-h-screen">
        <div class="container mx-4 sm:mx-6 lg:mx-8 rounded-lg border-2 border-t-4">

            @yield('content')
        </div>
    </div>

    {{-- FOOTER WITH LINKS --}}
    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} Eshop. All rights reserved.</p>
            <div class="mt-2">
                <a href="#" class="text-gray-400 hover:text-white mx-2">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white mx-2">Terms of Service</a>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Toggle visibility of auth links when hamburger icon is clicked
        $('#hamburger-icon').click(function() {
            $('#auth-links').toggle();
        });
    });
    </script>
</body>
</html>

</html>

