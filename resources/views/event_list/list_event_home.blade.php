<section class="mt-5 w-100 h-100">
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                @if(count($events) > 0)
                @foreach ($events as $item)

                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('/') }}{{ get_image_category($item->image_path) }}" class="card-img-top"
                            alt="..." height="300">

                        <div id="description_ticekt">
                            <h5>Deskripsi</h5>
                            {{ $item->description }}
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">
                            <table>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>{{ rupiah($item->ticket_price) }}</td>
                                </tr>

                                <tr>
                                    <td>Lokasi</td>
                                    <td>:</td>
                                    <td>{{ $item->location }}</td>
                                </tr>

                                <tr>
                                    <td>Tanggal Event</td>
                                    <td>:</td>
                                    <td>{{ format_date($item->start_date) }}</td>
                                </tr>

                                <tr>
                                    <td>Waktu Pelaksanaan</td>
                                    <td>:</td>
                                    <td>{{ format_time($item->start_date) }} - {{ format_time($item->end_date) }}</td>
                                </tr>

                                <tr>
                                    <td>Sisa Tiket</td>
                                    <td>:</td>
                                    <td>{{ $item->total_tickets }} pcs</td>
                                </tr>

                            </table>
                            </p>


                            @if ($item->total_tickets < 1) <button class="btn btn-danger w-100" disabled>Tiket
                                Habis
                                </button>
                                @else
                                <a href="#" class="btn btn-primary w-100">Pesan Tiket</a>
                                @endif




                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <center>
                    <img src="{{ asset('/') }}assets/images/data_not_found.png" style="width: 450px">
                </center>
                @endif



            </div>
        </div>
</section>