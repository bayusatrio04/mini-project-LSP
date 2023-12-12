<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            {{-- <a class="navbar-brand" href="#">Navbar</a> --}}

            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/Eventku Logo.png') }}" class="offset-md-1" width="70" height="70">
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (isset($value) && $value == 'pembayaran') active @endif" href="{{ route('pembayaran') }}">Pembayaran</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @if (isset($value) && $value == 'riwayat_transaksi') active @endif" href="{{ route('riwayat_transaksi') }}">Riwayat Transaksi</a>
                    </li>
                </ul>

                <div class="d-flex">
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
                                <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <div class="user-profile">
                                        <img class="rounded-circle" src="{{ asset('/')}}{{ get_image() }}" alt=""
                                            width="50" height="50">
                                        <span>{{ $user_login->name }}</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">

                                    @if ($user_login->isAdmin == 1)
                                    <li>
                                        <a class="dropdown-item btn btn-link text-warning" data-bs-toggle="offcanvas"
                                            href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                                            Dashboard Admin
                                        </a>
                                    </li>
                                    @endif


                                    @if ($user_login->isAdmin == 0)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profil') }}">
                                            Profil
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
                </div>
            </div>
        </div>
    </nav>
</div>
