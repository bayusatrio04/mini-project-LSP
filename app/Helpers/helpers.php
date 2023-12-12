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
