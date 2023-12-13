@extends('layouts.app')

@section('title', 'Home')

@section('addStyle')


@endsection

@section('content')




<div class="container mt-5">


    <a class="btn btn-danger mb-4" href="{{ route('home') }}">Kembali</a>

    @if(session('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card mb-4">
        <div class="card-body row">
            <div class="col-md-4">
                <img src="{{ asset('/') }}{{ get_image_category($event->image_path) }}" class="card-img-top" alt="..."
                    height="340">
            </div>

            <div class="col-md-8">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p style="text-align: justify">{{ $event->description }}</p>

                <table class="table">
                    <tr>
                        <td>Category</td>
                        <td>:</td>
                        <td>
                            @foreach(explode(',', $event->category_events) as $categoryId)
                            @php
                                $category = $categories->where('id', $categoryId)->first();
                            @endphp
                            @if($category)
                            <span class="badge text-bg-warning">{{ $category->category_name }}</span>
                            @endif
                        @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td>{{ rupiah($event->ticket_price) }}</td>
                    </tr>

                    <tr>
                        <td>Lokasi</td>
                        <td>:</td>
                        <td>{{ $event->location }}</td>
                    </tr>

                    <tr>
                        <td>Tanggal Event</td>
                        <td>:</td>
                        <td>{{ format_date($event->start_date) }}</td>
                    </tr>

                    <tr>
                        <td>Waktu Pelaksanaan</td>
                        <td>:</td>
                        <td>{{ format_time($event->start_date) }} - {{ format_time($event->end_date) }}</td>
                    </tr>

                    <tr>
                        <td>Sisa Tiket</td>
                        <td>:</td>
                        <td>{{ $event->total_tickets }} pcs</td>
                    </tr>

                </table>



            </div>
        </div>

    </div>
    @unless(Auth::user() && Auth::user()->isAdmin == 1)
    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('pemesanan.beli_tiket', $event->id) }}" id="beli_tiket" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Jumlah Beli</label>
                    <input id="jml_beli" type="number" class="form-control @error('name') is-invalid @enderror"
                        name="jml_beli" value="{{ old('jml_beli') }}" required autofocus min="1" max="2">


                    @error('jml_beli')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </form>
        </div>


        <div class="col-md-2">
            <div class="form-group mb-3">
                <label for="name"></label>
                <button class="form-control btn btn-primary" form="beli_tiket">Beli</button>
            </div>
        </div>
    </div>
    @endunless



</div>





@endsection
