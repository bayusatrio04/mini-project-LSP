@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" onsubmit="return validateForm()">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password"  autocomplete="current-password">
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
        function validateForm() {
        var PasswordInput = document.getElementById('password').value;
        var EmailInput = document.getElementById('email').value;

        if (PasswordInput.trim() === '') {
            alert('Field password Tidak boleh kosong!');
            return false;
        }else if(EmailInput.trim() === '' || EmailInput.trim() === '@'){
            alert('Field Email Tidak boleh kosong!');
            return false;
        }

        return true;
    }
</script>
