<?php


function get_user_login()
{


    return auth()->user();
}


function get_image()
{


    $user_login = get_user_login();

    if ($user_login->user_picture != null) {

        $img_path = 'storage/' . $user_login->user_picture;
    } else {
        $img_path = "assets/images/user_default.jpg";
    }

    // dd($img_path);

    return $img_path;
}

function get_image_category($data_image)
{


    if ($data_image != null) {

        $img_path = 'storage/' . $data_image;
    } else {
        $img_path = "assets/images/image_thumbnail_default.jpg";
    }

    // dd($img_path);

    return $img_path;
}

function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function format_date($date)
{

    // Membuat objek DateTime dari string tanggal
    $dateTime = new DateTime($date);

    // Memformat tanggal ke format yang diinginkan
    $formattedDate = $dateTime->format('d F Y');

    return $formattedDate;
}


function format_time($time)
{

    $dateTime = new DateTime($time);

    // Memformat waktu ke dalam format yang diinginkan
    $formattedTime = $dateTime->format('H.i');

    return $formattedTime;
}

function sisa_waktu_bayar($dueDate)
{



    // Konversi string ke objek DateTime
    $dueDateTime = new DateTime($dueDate);

    // Menambahkan 1 hari ke waktu pembayaran
    $dueDateTime->add(new DateInterval('P1D'));

    // Waktu sekarang
    $currentDateTime = new DateTime();

    // Hitung selisih waktu
    $timeDiff = date_diff($currentDateTime, $dueDateTime);

    // Ambil sisa waktu dalam format yang diinginkan
    $remainingTime = $timeDiff->format('%R%a hari, %h jam, %i menit, %s detik');

    // Tampilkan sisa waktu
    return $remainingTime;
}
function limitWords($text, $limit = 30, $ellipsis = '...')
{
    $words = explode(' ', $text);
    if (count($words) > $limit) {
        $text = implode(' ', array_slice($words, 0, $limit)) . $ellipsis;
    }
    return $text;
}
function status_transaksi($status)
{


    $hasil = "";


    if ($status == 0) {
        $hasil = "<span class='badge bg-secondary'>Belum bayar</span>";
    } elseif ($status == 1) {
        $hasil = "<span class='badge bg-warning'>Sudah bayar, menunggu konfirmasi admin</span>";
    } elseif ($status == 2) {
        $hasil = "<span class='badge bg-danger'>Batal</span>";
    } elseif ($status == 3) {
        $hasil = "<span class='badge bg-success'>Pembayaran diterima</span>";
    } elseif ($status == 4) {
        $hasil = "<span class='badge bg-warning'>Sedang proses pengajuan refund</span>";
    } elseif ($status == 5) {
        $hasil = "<span class='badge bg-success'>Pengajuan refund berhasil</span>";
    }

    return $hasil;
}
