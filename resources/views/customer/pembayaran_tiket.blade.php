@extends('layouts.app')

@section('title', 'Home')

@section('addStyle')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

@endsection

@section('content')




<div class="container mt-5">


    {{-- <a class="btn btn-danger mb-4" href="{{ route('home') }}">Kembali</a> --}}

    @if(session('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Perhatian!</strong> Jika tiket tidak dibayarkan selama 1 hari, maka tiket akan otomatis dibatalkan!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            Data Pembayaran Tiket
        </div>
        <div class="card-body">

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Event</th>
                        <th>Jumlah Pesanan</th>
                        <th>Total Pembayaran</th>
                        <th>Sisa Waktu Bayar</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($transaksi as $item)


                    <tr>
                        <td>
                            <a class="text-dark" href="{{ route('pemesanan',$item->id_event) }}"
                                style="text-decoration: none">{{
                                $item->title }}</a>

                        </td>
                        <td>{{ $item->qty }} Tiket</td>
                        <td>{{ rupiah($item->total_transaction) }}</td>
                        <td>
                            {{ sisa_waktu_bayar($item->created_at) }}
                        </td>
                        <td>
                            @php
                                $id = $item->id;
                            @endphp
                            <a class="btn btn-danger" href="{{ route('pemesanan.batal', $item->id) }}">Batalkan</a>
                            <button type="button" class="btn btn-primary bayar-modal" data-bs-toggle="modal"
                                data-bs-target="#modalBayar" data-id="{{ $item->id }}">Bayar</button>

                        </td>

                    </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="modalBayar" tabindex="-1" aria-labelledby="modalBayarLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalBayarLabel">Pembayaran Tiket</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Perhatian!</strong> Lakukan pembayaran ke rekening BCA (123312333) a.n Mulyanto Supriadi
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>

                                        <form action="{{ route('pembayaran.bayar_tiket') }}" id="formBayar" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" id="id_transaksi" name="id_transaksi" value="{{ $item->id }}">

                                            <div class="form-group mb-3">
                                                <label for="bukti_bayar">Bukti Bayar</label>
                                                <input id="bukti_bayar" type="file"
                                                    class="form-control @error('bukti_bayar') is-invalid @enderror" name="bukti_bayar"
                                                    value="{{ old('bukti_bayar') }}" accept="image/*" required>
                                                @error('bukti_bayar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" form="formBayar" class="btn btn-primary">Bayar</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama Event</th>
                        <th>Jumlah Pesanan</th>
                        <th>Total Pembayaran</th>
                        <th>Sisa Waktu Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>

        </div>

    </div>

</div>




@endsection

@section('addScript')

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    new DataTable('#example');
</script>

<script>
    $(document).on("click", ".bayar-modal", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #id_transaksi").val( myBookId );
     // As pointed out in comments,
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>

<script>
    $(document).ready(function() {
        $('#bukti_bayar').change(function() {
            // Ambil file input
            var inputFile = this;

            // Cek apakah file telah dipilih
            if (inputFile.files && inputFile.files[0]) {
                var fileSize = inputFile.files[0].size; // Ukuran file dalam byte
                var maxSize = 2 * 1024 * 1024; // Maksimum 2 MB (sesuaikan dengan kebutuhan Anda)

                // Cek apakah ukuran file melebihi batas maksimum
                if (fileSize > maxSize) {
                    alert('Ukuran gambar melebihi batas maksimum (2 MB).');
                    $(this).val(''); // Bersihkan nilai input
                }
            }
        });
    });


</script>

@endsection
