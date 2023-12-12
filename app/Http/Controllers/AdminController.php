<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboards(){
        return view("admin.dashboard");
    }
    public function orders(){
        return view("admin.orders");
    }

    public function customers(){
        return view("admin.customers");
    }
}
