@extends('layouts.app-admin')

@section('title', 'Orders')

@section('content')



<div class="col-lg-10 px-md-4">


    {{-- <a class="btn btn-danger mb-4" href="{{ route('home') }}">Kembali</a> --}}

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
    <div class="card">
        <div class="row">
            <div class="col-md-9">

                <div class="my-4 mx-3">
                    <h1 class="h2 color-primary">Orders</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboards') }}">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
                        </ol>
                    </nav>

                </div>
            </div>
            <div class="col-md-2">
                <div class="my-4 mx-3 col-xl-12 col-lg-6 col-md-12 col-12">
                    <div class="card">
                       <div class="card-body">
                          <div class="d-flex justify-content-between align-items-center mb-3">
                             <div>
                                 <h4 class="mb-0 bad"><span class="badge bg-info">Orders</span></h4>
                             </div>
                             <div class="icon-shape icon-md bg-light-primary text-info rounded-2">
                                 <i class="bi bi-cart-plus"></i>
                             </div>
                          </div>
                          <div class="align-center offset-md-4">
                             <h5 class="fw-bold">{{ $transactionCount }}</h5>

                          </div>
                       </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <hr>
    <div class="alert alert-warning alert-dismissible fade show " role="alert">
        <strong>Perhatian!</strong> Jika tiket tidak dibayarkan selama 1 hari, maka tiket akan otomatis dibatalkan!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>


    <div class="card mb-4 ">

        <div class="card-body">
            <div class="mx-3 my-3"  id="filterLinks">
                <span class="fw-bold">Filtering :</span><br>
                <a href="{{ route('admin.orders') }}" ><span class="badge text-bg-primary">All</span></a>

                <a href="{{ route('admin.orders', ['status' => 0]) }}">
                    {!! status_transaksi(0) !!}
                </a>
                <a href="{{ route('admin.orders', ['status' => 1]) }}">
                    {!! status_transaksi(1) !!}
                </a>
                <a href="{{ route('admin.orders', ['status' => 2]) }}">
                    {!! status_transaksi(2) !!}
                </a>
                <a href="{{ route('admin.orders', ['status' => 3]) }}">
                    {!! status_transaksi(3) !!}
                </a>
                <a href="{{ route('admin.orders', ['status' => 4]) }}">
                    {!! status_transaksi(4) !!}
                </a>
                <a href="{{ route('admin.orders', ['status' => 5]) }}">
                    {!! status_transaksi(5) !!}
                </a>
            </div>
            @if ($isEmpty)
            <div class="alert alert-danger" role="alert">
                Tidak terdapat transaksi dengan status transaction tersebut.
            </div>

            @else
            <table id="example" class="table table-striped table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th>Nama Event</th>
                        <th>Jumlah Pesanan</th>
                        <th>Siswa Waktu Pembayaran</th>
                        <th>Status Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaction as $item)
                        <tr>
                            <td>
                                <a class="text-dark" href="{{ route('pemesanan', $item->id_event) }}"
                                    style="text-decoration: none">{{ $item->event->title }}</a>
                            </td>
                            <td>{{ $item->qty }} Tiket</td>
                            <td>{{ sisa_waktu_bayar($item->created_at) }}</td>
                            <td>{!! status_transaksi($item->status_transaction) !!}</td>
                            <td class="">

                                <a href="{{ route('orders.show', $item->id) }}" class="btn btn-outline-info fs-5" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="View Details">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('orders.print', $item->id) }}" class="btn btn-outline-success fs-5" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Prints Orders"
                                    target="_blank"><i class="bi bi-printer"></i></a>
                                <a href="{{ route('orders.download', $item->id) }}" class="btn btn-outline-primary fs-5" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Download"
                                    target="_blank"><i class="bi bi-file-earmark-arrow-down"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama Event</th>
                        <th>Jumlah Pesanan</th>
                        <th>Sisa Waktu Pembayaran</th>
                        <th>Status Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
            @endif
        </div>

    </div>

</div>

<script>
    $(document).ready(function() {

        $('#filterLinks a').click(function(e) {
            e.preventDefault();


            var url = $(this).attr('href');


            var parts = url.split('?');
            var baseUrl = parts[0];
            var params = parts[1] ? '?' + parts[1] : '';


            $('#filterLinks a').removeClass('active');
            $(this).addClass('active');


            $.ajax({
                url: baseUrl + '/ajax' + params,
                type: 'GET',
                success: function(data) {

                    $('#example tbody').html(data);
                },
                error: function() {
                    console.log('Gagal memuat data.');
                }
            });
        });
    });
</script>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });


</script>

@endsection
