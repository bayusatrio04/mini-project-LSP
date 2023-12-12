<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('home', compact('users'));
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
