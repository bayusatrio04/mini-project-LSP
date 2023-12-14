@extends('layouts.app-admin')

@section('title', 'List Users')

@section('content')
<style>

    a{
        text-decoration: none;
      }

      .pagination{
        padding: 30px 0;
      }

      .pagination ul{
        margin: 0;
        padding: 0;
        list-style-type: none;
      }

      .pagination a{
        display: inline-block;
        padding: 10px 18px;
        color: #222;
      }

      .p12 a:first-of-type, .p12 a:last-of-type, .p12 .is-active{
        background-color: #F69413;
        color: #fff;
        font-weight: bold;
      }

    </style>
<div class="col-lg-10 px-md-4">
    @auth

    <div class="card">
        <div class="row">
            <div class="col-md-9">

                <div class="my-4 mx-3">
                    <h1 class="h2 color-primary">Users</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboards') }}">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                                 <h4 class="mb-0 bad"><span class="badge bg-info">Users</span></h4>
                             </div>
                             <div class="icon-shape icon-md bg-light-primary text-info rounded-2">
                                 <i class="bi bi-people-fill"></i>
                             </div>
                          </div>
                          <div class="align-center offset-md-4">
                             <h5 class="fw-bold">{{ $userCount }}</h5>

                          </div>
                       </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="row">

            <div class="col-md-"></div>
                <div class="col-md-12">
                    <div class="mt-3 mb-3">





                    </div>

                    <div class="d-flex">

                        <h1 class="">Daftar Pengguna</h1>

                    </div>
                    <table class="table table-bordered">
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
                <div class="offset-md-2">

                    {{ $users->links('vendor.pagination.custom') }}
                </div>

        @endauth
    </div>

</div>

@endsection
