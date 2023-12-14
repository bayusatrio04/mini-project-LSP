@extends('layouts.app-admin')

@section('title', 'Dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/filter_multi_select.css') }}">



<main class="col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <div class="card col-md-12">
            <div class="row">
                <div class="my-4 mx-3">
                    <h1 class="h2 color-primary">Dashboard</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboards') }}">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <hr>
    <div class="row my-3">
        <div class="col-lg-12 col-md-12 col-12">
           <div>

           </div>
        </div>

        <div class="mt-6 col-xl-3 col-lg-6 col-md-12 col-12">
           <div class="card">
              <div class="card-body">
                 <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                       <h4 class="mb-0 bad"><span class="badge bg-danger">UnPaid</span></h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-danger rounded-2">
                        <i class="bi bi-cart-x"></i>
                    </div>
                 </div>
                 <div>
                    <h1 class="fw-bold">{{ $unpaidCount }}</h1>

                 </div>
              </div>
           </div>
        </div>
        <div class="mt-6 col-xl-3 col-lg-6 col-md-12 col-12">
           <div class="card">
              <div class="card-body">
                 <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="mb-0 bad"><span class="badge bg-success">Paid</span></h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-success rounded-2">
                        <i class="bi bi-bag-check"></i>
                    </div>
                 </div>
                 <div>
                    <h1 class="fw-bold">{{ $paidCount }}</h1>

                 </div>
              </div>
           </div>
        </div>
        <div class="mt-6 col-xl-3 col-lg-6 col-md-12 col-12">
           <div class="card">
              <div class="card-body">
                 <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="mb-0 bad"><span class="badge bg-warning">Cancel</span></h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-warning rounded-2">
                        <i class="bi bi-x-square"></i>
                    </div>
                 </div>
                 <div>
                    <h1 class="fw-bold">{{ $canceledCount }}</h1>

                 </div>
              </div>
           </div>
        </div>
        <div class="mt-6 col-xl-3 col-lg-6 col-md-12 col-12">
           <div class="card">
              <div class="card-body">
                 <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="mb-0 bad"><span class="badge bg-info">Refund Process</span></h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-info rounded-2">
                        <i class="bi bi-arrow-clockwise"></i>
                    </div>
                 </div>
                 <div>
                    <h1 class="fw-bold">{{ $refundProcessingCount }}</h1>

                 </div>
              </div>
           </div>
        </div>

        <div class="mt-3 col-xl-3 col-lg-6 col-md-12 col-12">
           <div class="card">
              <div class="card-body">
                 <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="mb-0 bad"><span class="badge bg-success">Refund Success</span></h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-success rounded-2">
                        <i class="bi bi-check-all"></i>
                    </div>
                 </div>
                 <div>
                    <h1 class="fw-bold">{{ $refundSuccessCount }}</h1>

                 </div>
              </div>
           </div>
        </div>




        <div class="mt-3 col-xl-3 col-lg-6 col-md-12 col-12">
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
                  <div>
                     <h1 class="fw-bold">{{ $transactionCount }}</h1>

                  </div>
               </div>
            </div>
        </div>
        <div class="mt-3 col-xl-3 col-lg-6 col-md-12 col-12">
            <div class="card">
               <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                     <div>
                         <h4 class="mb-0 bad"><span class="badge bg-primary">Customers</span></h4>
                     </div>
                     <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                         <i class="bi bi-people-fill"></i>
                     </div>
                  </div>
                  <div>
                     <h1 class="fw-bold">{{ $userCount }}</h1>

                  </div>
               </div>
            </div>
        </div>
        <div class="mt-3 col-xl-3 col-lg-6 col-md-12 col-12">
            <div class="card" style="height: 140px;">
               <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                     <div>
                         <h4 class="mb-0 bad"><span class="badge bg-warning">Amount</span></h4>
                     </div>
                     <div class="icon-shape icon-md bg-light-primary text-warning rounded-2">
                         <i class="bi bi-people-fill"></i>
                     </div>
                  </div>
                  <div>
                     <h1 class="fs-2">{{ rupiah($totalTransactionAmount) }}</h1>

                  </div>
               </div>
            </div>
        </div>
     </div>
</main>



@endsection
