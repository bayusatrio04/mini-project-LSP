@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>

                            <div class="mb-3">

                                <label class="" for="account">Belum Punya Account? <a href="{{ route('register') }}">Register Here</a></label>
                            </div>
                            <div class="mb-3">

                                <label class="" for="fotgotpassword"><a href="">Lupa Password?</a></label>
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
