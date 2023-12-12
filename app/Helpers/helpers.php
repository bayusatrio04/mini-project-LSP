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
