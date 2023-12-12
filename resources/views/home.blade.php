@extends('layouts.app')

@section('title', 'Home')

@section('content')
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
@if(Auth::user() && Auth::user()->isAdmin)
    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        Menu Admin
    </a>
@endif


  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link bg-primary text-white p-2 mt-3" href="#">Create New User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-primary text-white p-2 mt-3" href="#">Read All Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-primary text-white p-2 mt-3" href="#">Update Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-primary text-white p-2 mt-3" href="#">Delete Users</a>
          </li>

        </ul>

      </div>
  </div>
  <div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h1>Explore and Find All Cateogry Events Ticket On-Step Here.</h1>
        </div>
        <div class="col-md-4">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste iusto officia adipisci incidunt reprehe
                nderit quam, id natus quasi accusantium repellendus maiores possimus et aut aspernatur sit, nemo velit voluptate ad?</p>
                <div class="mt-5">
                    <b>Expolore your Tickets</b>
                </div>
        </div>
    </div>
    <style>
        .custom-card {
            background-color: white;
            border: none !important;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            height: 100%;
        }

        .custom-card img {
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <section class="mt-5 w-100 h-100">
        <div class="row">
            <div class="col-md-4">
                <div class="card custom-card">
                    <img src="{{ asset('assets/images/events1.jpg') }}" class="card-img-top" alt="Event 1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card custom-card">
                    <img src="{{ asset('assets/images/events2.jpg') }}" class="card-img-top" alt="Event 2">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card custom-card">
                    <img src="{{ asset('assets/images/events3.jpg') }}" class="card-img-top" alt="Event 3">
                </div>
            </div>
        </div>
        {{-- Search --}}
        <section class="bg-white">
        <div class="d-flex">
            <p>UpComing</p>
            <p>Coming Soon</p>
            <p> Soon</p>
        </div>
        <div>
            <div class="row p-3">
                <div class="col-md-3">
                    <form action="{{ route('users.search') }}" method="GET" class="form-inline my-2 my-lg-0 d-flex">
                        <input class="form-control mr-sm-2  " type="search" placeholder="Search" aria-label="Search" name="query">


                </div>
                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>

                </div>
                <div class="col-md-3">
                    <button class="btn btn-outline-success my-2 my-sm-0 ms-5" type="submit">Search</button>
                </form>
                </div>
            </div>
        </div>
        </section>
    </section>
  </div>

    <div class="container mt-5">
        <div class="row">
            @auth
                <div class="col-md-4">
                    <h1>Daftar Pengguna</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Is Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if ($user->isAdmin == 1)
                                    <td>True (1)</td>
                                    @else
                                    <td>False (0)</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 offset-md-2">
            @else
                <div class="col-md-6 offset-md-3">
            @endauth
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Welcome to Mini Project Website</h2>

                        @guest
                            <p>Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to access more features.</p>
                        @else
                            <p>Hello, {{ Auth::user()->name }}!</p>
                            <p>Your email: {{ Auth::user()->email }}</p>
                            <p>Role: {{ Auth::user()->isAdmin ? 'Admin' : 'User' }}</p>
                        @endguest
                    </div>
                </div>
            </div>
            @auth
                <div class="col-md-2"></div>
            @endauth
        </div>
        @auth
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{ route('users.search') }}" method="GET" class="form-inline my-2 my-lg-0 d-flex">
                    <input class="form-control mr-sm-2  " type="search" placeholder="Search" aria-label="Search" name="query">
                    <button class="btn btn-outline-success my-2 my-sm-0 ms-5" type="submit">Search</button>
                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
        @endauth
    </div>

@endsection
