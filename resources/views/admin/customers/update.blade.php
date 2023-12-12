

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



                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('customers.update', $user->id) }}" class="form-group" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <p><strong>Name:</strong> <input type="text" class="form-control" name="name" value="{{ $user->name }}"> </p>
                    <p><strong>Email:</strong> <input type="text" class="form-control" name="email" value="{{ $user->email }}" readonly> </p>
                    <p><strong>Gender:</strong> <input type="text" class="form-control" name="gender" value="{{ $user->gender }}" readonly></p>
                    <p><strong>Ages:</strong>  <input type="text" class="form-control" name="ages" value="{{ $user->ages }}" readonly></p>
                    <p>

                        <span class="badge text-bg-primary">{{ $user->isAdmin }}</span>
                    </p>
                    <button type="submit" class="btn btn-primary">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
