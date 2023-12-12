

@extends('layouts.app-admin')
@section('title', 'List Customer / Add')
@section('content')
    <div class="container">
        <h2>Create Customer</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>

                <select class="form-select" name="gender" aria-label="Default select example">
                    <option value="" selected>Choose Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>

                  </select>
            </div>

            <div class="mb-3">
                <label for="ages" class="form-label">Ages</label>
                <input type="number" class="form-control" id="ages" name="ages" value="{{ old('ages') }}">
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    required autocomplete="new-password">
            </div>
            <div class="mb-3">
                <label for="is Admin ?" class="form-label">Is Admin ?</label>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="isadmin" id="btnradio1" value="1"  autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="btnradio1">True</label>

                    <input type="radio" class="btn-check" name="isadmin" id="btnradio2" value="0" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio2">False</label>


                  </div>
            </div>
            <div class="mb-3">
                <label for="image_path" class="form-label">Image</label>
                <div id="preview_img"
                class="user-photo-container d-flex justify-content-center align-items-center mb-3">






                <div class="form-group">
                    <label for="user_photo">
                        <img class="rounded-circle user_photo"
                            src="{{ asset('/') }}assets/images/user_default.jpg" alt="" width="250"
                            height="250">
                    </label>
                    <div class="overlay btn btn-dark" onclick="openFileInput()">
                        <span>Ganti Foto</span>
                    </div>

                    <input type="file" id="user_photo" name="user_photo" accept="image/*"
                        onchange="displayImage(this)" class="form-control">

                </div>



            </div>

            @error('user_photo')
            <center>
                <div class="mb-3 text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            </center>
            @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Customer</button>
        </form>
    </div>
    <script>

        function openFileInput() {
        document.getElementById('user_photo').click();
      }


      function displayImage(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            document.querySelector('.user_photo').setAttribute('src', e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>
@endsection
