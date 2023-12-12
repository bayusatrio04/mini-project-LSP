@extends('layouts.app')

@section('title', 'Home')

@section('addStyle')

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

        height: 280px;
        object-fit: cover;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(84, 240, 123, 0.6);
        transition: background-color 0.5s;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .overlay2 {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(224, 45, 29, 0.6);
        transition: background-color 0.5s;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .overlay3 {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(167, 29, 217, 0.6);
        transition: background-color 0.5s;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .card-text-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        text-align: center;
    }

    .custom-card:hover .overlay {
        background-color: rgba(0, 0, 0, 0.7);
    }

    .custom-card:hover .overlay2 {
        background-color: rgba(0, 0, 0, 0.7);
    }

    .custom-card:hover .overlay3 {
        background-color: rgba(0, 0, 0, 0.7);
    }



    .card {
        position: relative;
        overflow: hidden;
    }

    .card:hover #description_ticekt {
        opacity: 1;
    }

    .card:hover img {
        filter: brightness(70%);
        /* Mengurangi kecerahan gambar */
    }

    #description_ticekt {
        position: absolute;
        top: 0%;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        height: 300px;
        opacity: 0;
        /* Default opacity: 0, hanya muncul saat di hover */
        background-color: rgba(0, 0, 0, 0.7);
        /* Warna latar belakang dengan alpha (transparansi) */
        color: #fff;
        /* Warna teks pada description */
        padding: 20px;
        text-align: justify;
        transition: opacity 0.3s ease;
    }
</style>

@endsection

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
            <li class="nav-item">
                <a class="nav-link bg-warning text-white p-2 mt-3" href="{{ route('admin.dashboards') }}">Dashboard
                    Admin</a>
            </li>

        </ul>

    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">
            <h1>Explore, Discover, and Secure Tickets for Every Event – All in One Place!</h1><i
                class="bi bi-box-arrow-in-up-right"></i>
        </div>
        <div class="col-md-4 offset-md-1">
            <p>
                Embark on an upcoming adventure with Eventku! Let us guide you to exciting places for an unforgettable
                experience.
            </p>
            <div clss="mt-5">
                <p>
                    <a href="#" class="text-decoration-none">
                        Explore your Tickets
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-in-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6.364 13.5a.5.5 0 0 0 .5.5H13.5a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 13.5 1h-10A1.5 1.5 0 0 0 2 2.5v6.636a.5.5 0 1 0 1 0V2.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H6.864a.5.5 0 0 0-.5.5">
                            </path>
                            <path fill-rule="evenodd"
                                d="M11 5.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793l-8.147 8.146a.5.5 0 0 0 .708.708L10 6.707V10.5a.5.5 0 0 0 1 0z">
                            </path>
                        </svg>
                    </a>
                </p>

            </div>
        </div>
    </div>

    <section class="mt-5 w-100 h-100">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    @foreach ($categories_take as $item)
                    <div class="col-md-4">
                        <div class="card custom-card position-relative">
                            <a href="?category={{ $item->id }}">
                                <img src="{{ asset('/') }}{{ get_image_category($item->category_image) }}"
                                    class="card-img-top" alt="Event 1">
                                <div class="overlay"></div>

                                <div class="card-text-overlay">
                                    <p class="text-center text-white fw-bold">{{ strtoupper($item->category_name) }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach




                    <div class="col-md-4">
                        <div class="card custom-card position-relative">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/images/events3.jpg') }}" class="card-img-top" alt="Event 1">
                                <div class="overlay3"></div>

                                <div class="card-text-overlay">
                                    <p class="text-center text-white fw-bold">ALL CATEGORIES</p>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <section class="bg-white shadow w-100 h-100 rounded">

                    <div>
                        <div class="row p-3">
                            <div class="col-md-6">
                                <form action="/" method="GET" class="form-inline my-2 my-lg-0 d-flex">
                                    <input class="form-control mr-sm-2 p-4" placeholder="Search" name="event_name"
                                        required>


                            </div>
                            <div class="col-md-4">
                                <select class="form-select p-4" aria-label="Default select example" name="category">
                                    <option selected disabled value="">Pilih Kategori</option>
                                    @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-2">

                                <button class="btn btn-warning text-white my-sm-0 ms-3 row" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                        class="bi bi-search-heart" viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018" />
                                        <path
                                            d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11" />
                                    </svg>
                                    Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            @include('event_list.list_event_home')

    </section>

</div>





@endsection