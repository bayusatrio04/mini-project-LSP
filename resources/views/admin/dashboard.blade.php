@extends('layouts.app-admin')

@section('title', 'Dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/filter_multi_select.css') }}">



<main class="col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row">


    </div>
    <div class="row">
        <!-- Total Customers Card -->
        <div class="col-md-4">
            <div class="card border-primary mb-3">
                <div class="card-body text-primary">
                    <h5 class="card-title">Total Customers</h5>
                    <p class="card-text h2">{{ $userCount }}</p>
                </div>
            </div>
        </div>

        <!-- Total Pembelian Ticket Card -->
        <div class="col-md-4">
            <div class="card border-success mb-3">
                <div class="card-body text-success">
                    <h5 class="card-title">Total Pembelian Ticket</h5>
                    <p class="card-text h2">{{ $transactionCount }}</p>
                </div>
            </div>
        </div>

        <!-- Total Rupiah Card -->
        <div class="col-md-4">
            <div class="card border-info mb-3">
                <div class="card-body text-info">
                    <h5 class="card-title">Total Rupiah</h5>
                    <p class="card-text h2">{{  rupiah($totalTransactionAmount) }}</p>
                </div>
            </div>
        </div>

        <!-- Total Ticket Berhasil Card -->
        <div class="col-md-6">
            <div class="card border-success mb-3">
                <div class="card-body text-success">
                    <h5 class="card-title">Total Ticket Berhasil</h5>
                    <p class="card-text h2">{{ $paidCount }}</p>
                </div>
            </div>
        </div>

        <!-- Total Gagal/Refund Ticket Card -->
        <div class="col-md-6">
            <div class="card border-danger mb-3">
                <div class="card-body text-danger">
                    <h5 class="card-title">Total Gagal/Refund Ticket</h5>
                    <p class="card-text h2">{{ $refundProcessingCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-warning mb-3">
                <div class="card-body text-warning">
                    <h5 class="card-title">Total Transaksi Belum Bayar</h5>
                    <p class="card-text h2">{{ $unpaidCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success mb-3">
                <div class="card-body text-success">
                    <h5 class="card-title">Total Transaksi ter-Confirm</h5>
                    <p class="card-text h2">{{ $paymentReceivedCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-info mb-3">
                <div class="card-body text-info">
                    <h5 class="card-title">Total Transaksi dibatalkan</h5>
                    <p class="card-text h2">{{ $canceledCount }}</p>
                </div>
            </div>
        </div>
    </div>


  </main>



@endsection
