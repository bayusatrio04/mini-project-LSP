

@extends('layouts.app-admin')
@section('title', 'Detail Customer')

@section('content')
<div class="container">
    <h2 class="my-4">
        <a href="{{ route('admin.customers') }}" class="btn btn-dark"><</a>
        Customer Details</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    @if ($user->user_picture)
                        <img src="{{ asset('storage/' . $user->user_picture) }}" alt="User Image" class="img-fluid mb-3">
                    @endif
                    <h5 class="card-title">{{ $user->name }}</h5>


                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Gender:</strong> {{ $user->gender }}</p>
                    <p><strong>Ages:</strong> {{ $user->ages}}</p>
                    <p>

                        <span class="badge text-bg-primary">{{ $user->isAdmin }}</span>
                    </p>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection
