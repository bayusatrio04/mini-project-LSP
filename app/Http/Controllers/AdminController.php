<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboards()
    {
        return view("admin.dashboard");
    }
    public function orders()
    {
        return view("admin.orders");
    }
    public function products()
    {
        return view("admin.products");
    }
    public function users()
    {
        return view("admin.users");
    }
}
