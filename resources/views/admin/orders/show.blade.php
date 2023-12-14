@extends('layouts.app-admin')

@section('title', 'Detail Order')

@section('content')
<div class="card mb-4">
    <h1 class="ms-3 my-3">
        <a href="{{ route('admin.orders') }}" class="btn btn-dark">
            <span class="fas fa-arrow-left"></span>
        </a>
        Code transaksi <span class="text-info">#{{ $transactions->id }}</span>
    </h1>
    <div class="card-body row">
        <div class="col-md-4">

            <img src="{{ asset('/') }}{{ get_image_category($transactions->event->image_path) }}" class="card-img-top"
                alt="..." height="340">

        </div>


        <div class="col-md-8">

            <h5 class="card-title">{{ $transactions->event->title }}</h5>
            <p style="text-align: justify">{{ $transactions->event->description }}</p>

            <table class="table">
                <tr>
                    <td>Pembeli Ticket</td>
                    <td>:</td>
                    <td class="text-info">
                        {{ ($transactions->user->name) }}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td>{{ rupiah($transactions->event->ticket_price) }}</td>
                </tr>

                <tr>
                    <td>Lokasi</td>
                    <td>:</td>
                    <td>{{ $transactions->event->location }}</td>
                </tr>

                <tr>
                    <td>Tanggal Event</td>
                    <td>:</td>
                    <td>{{ format_date($transactions->event->start_date) }}</td>
                </tr>

                <tr>
                    <td>Waktu Pelaksanaan</td>
                    <td>:</td>
                    <td>{{ format_time($transactions->event->start_date) }} - {{
                        format_time($transactions->event->end_date) }}</td>
                </tr>


                <!-- Informasi Transaksi -->
                <tr>
                    <td>Status Pembayaran</td>
                    <td>:</td>
                    <td> {!! status_transaksi($transactions->status_transaction) !!} </td>
                </tr>

                <tr>
                    <td>Jumlah Tiket Dipesan</td>
                    <td>:</td>
                    <td>{{ $transactions->qty }}</td>
                </tr>

                <tr>
                    <td>Total Pembayaran</td>
                    <td>:</td>
                    <td>{{ rupiah($transactions->total_transaction) }}</td>
                </tr>
                <tr>
                    @if ($transactions->status_transaction == 1)

                    <td>Bukti Pembayaran</td>
                    <td>:</td>
                    <td class="">
                        <a href="{{ asset('storage/' . $transactions->bukti_bayar) }}" target="_blank"
                            class="btn btn-info">
                            <i class="bi bi-eye"></i> Lihat Bukti
                        </a>
                        <a class="btn btn-primary" href="{{ asset('/') }}storage/{{ $transactions->bukti_bayar }}"
                            download=""><i class="bi bi-cloud-download"></i></a>
                    </td>
                    @elseif ($transactions->status_transaction == 2)
                    <td>Order Tiket Batal</td>

                    @endif
                </tr>
                <tr>
                    @if ($transactions->status_transaction == 1)
                    <td>Konfirmasi Pembayaran</td>
                    <td>:</td>
                    <td>
                        <form action="{{ route('orders.update', $transactions->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Konfirmasi</button>
                        </form>
                    </td>
                    @endif
                    @if ($transactions->status_transaction == 4)
                    <td>Konfirmasi Refund</td>
                    <td>:</td>
                    <td>
                        <form action="{{ route('orders.update.refund', $transactions->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-warning">Konfirmasi Refund</button>
                        </form>
                    </td>
                    @endif
                </tr>
            </table>
        </div>

    </div>


</div>
@endsection
