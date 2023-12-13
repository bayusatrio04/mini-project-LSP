<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mini Project 1')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.1/css/all.min.css">

    <style>
        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile img {
            margin-right: 10px;
            /* Sesuaikan margin sesuai kebutuhan */
        }
    </style>

    @yield('addStyle')

</head>

<body class="bg-light">


    @include('layouts.navbar')

    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
    @endif
    @if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
    @endif



    <div class="container mt-5">
        @yield('content')
    </div>

    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">

            </ul>
            <p class="text-center text-body-secondary">© 2023 Development By : Eventku</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>






</body>

</html>

@yield('addScript')
