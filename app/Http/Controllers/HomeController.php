<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {

        $data = [

            'users' => User::all(),
            'user_login' => get_user_login()
        ];


        return view('home', $data);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->orWhere('isAdmin', 'like', "%$query%")
            ->get();

        return view('users.index', compact('users'));
    }
}