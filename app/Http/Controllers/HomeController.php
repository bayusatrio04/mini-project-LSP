<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {

        if (!isset($_GET['category_events']) && !isset($_GET['event_name'])) {

            $events = Event::all();
        } elseif (isset($_GET['category_events']) && !isset($_GET['event_name']) || $_GET['event_name'] == "" && isset($_GET['category_events'])) {


            $events = Event::byCategory($_GET['category_events'])->get();

            // dd($events);
        } elseif (isset($_GET['category_events']) && isset($_GET['event_name'])) {
            $events = Event::byCategoryAndName($_GET['category_events'], $_GET['event_name'])->get();
        } elseif (isset($_GET['event_name'])) {
            $events = Event::byEventName($_GET['event_name'])->get();
        }


        $data = [
            'categories_take' => Category::take(2)->get(),
            'categories' => Category::all(),
            'users' => User::all(),
            'user_login' => get_user_login(),
            'events' => $events
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
