@extends('layouts.app-admin')

@section('title', 'Orders')

@section('content')
<div class="container mt-5">


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


    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Perhatian!</strong> Jika tiket tidak dibayarkan selama 1 hari, maka tiket akan otomatis dibatalkan!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            Data Pembayaran Tiket
        </div>
        <div class="card-body">

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Event</th>
                        <th>Jumlah Pesanan</th>
                        <th>Total Pembayaran</th>
                        <th>Sisa Waktu Bayar</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($transaction as $item)


                    <tr>
                        <td>
                            <a class="text-dark" href="{{ route('pemesanan',$item->id_event) }}"
                                style="text-decoration: none">{{
                                $item->event->title }}</a>

                        </td>
                        <td>{{ $item->qty }} Tiket</td>
                        <td>{{ rupiah($item->total_transaction) }}</td>
                        @if($item->status_transaction === 3)
                            <td>
                                {!! status_transaksi($item->status_transaction) !!}
                            </td>
                        @elseif($item->status_transaction === 1)
                            <td>
                                {!! status_transaksi($item->status_transaction) !!}
                            </td>
                        @else
                            <td>
                                {{ sisa_waktu_bayar($item->created_at) }}
                            </td>
                        @endif
                        <td class="ms-3 mt-3">
                            <a href="{{ route('orders.show', $item->id) }}" class="btn btn-info">Read</a>
                            <form action="{{ route('orders.destroy', $item->id) }}" method="POST" style="display: inline;">


                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-0">Delete</button>
                            </form>
                            <a href="{{ route('orders.print', $item->id) }}" class="btn btn-success" target="_blank">Cetak Bukti</a>
                            <a href="{{ route('orders.download', $item->id) }}" class="btn btn-info" target="_blank">Download Bukti</a>

                        </td>

                    </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama Event</th>
                        <th>Jumlah Pesanan</th>
                        <th>Total Pembayaran</th>
                        <th>Sisa Waktu Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>

        </div>

    </div>

</div>

@endsection
