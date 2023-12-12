@extends('layouts.app-admin')

@section('title', 'List Users')

@section('content')
<div class="container mt-5">
    @auth

    <div class="col-md-12">
        <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Tambah Customers +</a>
        <div class="card">
            <div class="card-body">

                <h2 class="card-title">Now the User is Logged In</h2>

                @guest
                    <p>Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to access more features.</p>
                @else
                    <p>Hello, {{ Auth::user()->name }}!</p>
                    <p>Your email: {{ Auth::user()->email }}</p>
                    <p>Role: {{ Auth::user()->isAdmin ? 'Admin' : 'User' }}</p>
                @endguest
            </div>
        </div>
    </div>
    <div class="row">

            <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="mt-3 mb-3">


                        <form action="{{ route('users.search') }}" method="GET" class="form-inline my-2 my-lg-0 d-flex">
                            <input class="form-control mr-sm-2  " type="search" placeholder="Search" aria-label="Search" name="query">
                            <button class="btn btn-outline-success my-2 my-sm-0 ms-5" type="submit">Search</button>
                        </form>


                    </div>

                    <div class="d-flex">

                        <h1 class="">Daftar Pengguna</h1>

                    </div>
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Is Admin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="text-center">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if ($user->isAdmin == 1)
                                    <td>True (1)</td>
                                    @else
                                    <td>False (0)</td>
                                    @endif
                                    <td class="ms-3 mt-3">
                                        <a href="{{ route('customers.show', $user->id) }}" class="btn btn-info">Read</a>
                                        <a href="{{ route('customers.edit', $user->id) }}" class="btn btn-warning">Update</a>
                                        <form action="{{ route('customers.destroy', $user->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

        @endauth
    </div>

</div>

@endsection
