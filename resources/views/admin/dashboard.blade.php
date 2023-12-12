@extends('layouts.app-admin')

@section('title', 'Dashboard')

@section('content')
<main class="col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row">
        <!-- Total Customers Card -->
        <div class="col-md-4">
            <div class="card border-primary mb-3">
                <div class="card-body text-primary">
                    <h5 class="card-title">Total Customers</h5>
                    <p class="card-text h2">500</p>
                </div>
            </div>
        </div>

        <!-- Total Pembelian Ticket Card -->
        <div class="col-md-4">
            <div class="card border-success mb-3">
                <div class="card-body text-success">
                    <h5 class="card-title">Total Pembelian Ticket</h5>
                    <p class="card-text h2">2000</p>
                </div>
            </div>
        </div>

        <!-- Total Rupiah Card -->
        <div class="col-md-4">
            <div class="card border-info mb-3">
                <div class="card-body text-info">
                    <h5 class="card-title">Total Rupiah</h5>
                    <p class="card-text h2">Rp 1,500,000,000</p>
                </div>
            </div>
        </div>

        <!-- Total Ticket Berhasil Card -->
        <div class="col-md-6">
            <div class="card border-success mb-3">
                <div class="card-body text-success">
                    <h5 class="card-title">Total Ticket Berhasil</h5>
                    <p class="card-text h2">1500</p>
                </div>
            </div>
        </div>

        <!-- Total Gagal/Refund Ticket Card -->
        <div class="col-md-6">
            <div class="card border-danger mb-3">
                <div class="card-body text-danger">
                    <h5 class="card-title">Total Gagal/Refund Ticket</h5>
                    <p class="card-text h2">50</p>
                </div>
            </div>
        </div>
    </div>


  </main>

@endsection
