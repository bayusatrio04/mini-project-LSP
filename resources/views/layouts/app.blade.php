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


    @if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
    @endif

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand container mx-auto " href="{{ route('home') }}">
            <img src="{{ asset('assets/images/Eventku Logo.png') }}" class="offset-md-1" width="70" height="70" alt=""
                srcset="">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="right: -100px !important;">
                @guest
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ route('login') }}">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                </li>
                @else
                {{-- @if(Auth::user() && Auth::user()->isAdmin) --}}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">

                    </a>
                    <ul class="dropdown-menu">
                        @if(Auth::user() && Auth::user()->isAdmin)
                        <li>
                            <a class="dropdown-item btn btn-link text-warning" data-bs-toggle="offcanvas"
                                href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                                Dashboard Admin
                            </a>
                        </li>
                        @endif
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item btn btn-link">Logout</button>
                            </form>
                        </li>
                        {{-- <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                    </ul>
                </li>



                {{-- @endif --}}

                @endguest
            </ul>
        </div>
    </nav>

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

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>






</body>

</html>

@yield('addScript')
