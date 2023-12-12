@extends('layouts.app')

@section('title', 'Home')

@section('addStyle')
<style>
    .user-photo-container {
        position: relative;
        display: inline-block;
    }

    .rounded-circle {
        border-radius: 50%;
        display: block;
        transition: filter 0.3s ease-in-out;
        cursor: pointer;
    }

    .user-photo-container:hover .rounded-circle {
        filter: brightness(50%);
        /* Sesuaikan persentase kegelapan sesuai keinginan Anda */
    }

    .overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        text-align: center;
    }

    .user-photo-container:hover .overlay {
        opacity: 1;
    }

    /* Tambahkan gaya untuk menyembunyikan input file */
    input[type="file"] {
        display: none;
    }
</style>

@endsection

@section('content')


@if(session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif



<div class="container mt-5">

    @if(session('success'))

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <form method="POST" action="{{ route('profil.update', $user_login->id) }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-4">
                <div id="preview_img"
                    class="user-photo-container d-flex justify-content-center align-items-center mb-3">

                    <div class="form-group">
                        <label for="user_photo">
                            <img class="rounded-circle user_photo" src="{{ asset('/') }}{{ get_image() }}" alt=""
                                width="250" height="250">
                        </label>
                        <div class="overlay btn btn-dark" onclick="openFileInput()">
                            <span>Ganti Foto</span>
                        </div>

                        <input type="file" id="user_photo" name="user_photo" accept="image/*"
                            onchange="displayImage(this)" class="form-control">

                        <input type="hidden" name="user_photo_old" value="{{ $user_login->user_picture }}">

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
            <div class="col-8">







                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $user_login->name }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="age">Age</label>

                    <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age"
                        value="{{ $user_login->age }}" required autocomplete="age">

                    @error('age')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <label for="gender">Gender</label>
                    <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" required
                        autocomplete="gender">
                        <option selected disabled value="">--Choose Your Gender--</option>
                        <option value='0' {{ $user_login->gender=='0' ? 'selected' : '' }}>Male</option>
                        <option value='1' {{ $user_login->gender=='1' ? 'selected' : '' }}>Female</option>
                    </select>


                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $user_login->email }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" autocomplete="new-password">

                    <span class="text-danger" role="alert">
                        <strong>*isi password jika ingin ubah password</strong>
                    </span>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        autocomplete="new-password">
                </div>


                <button type="submit" class="btn btn-primary w-100">Update Profil</button>

            </div>
        </div>
    </form>
</div>


@endsection

@section('addScript')

<script>
    // Fungsi untuk menampilkan gambar yang dipilih di elemen img
    function openFileInput() {
    document.getElementById('user_photo').click();
  }

  // Fungsi untuk menampilkan gambar yang dipilih di elemen img
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