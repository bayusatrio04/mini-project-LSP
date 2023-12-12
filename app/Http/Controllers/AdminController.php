<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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


    public function customers()
    {
        $users = User::all();


        return view("admin.customers", compact('users'));
    }
}
