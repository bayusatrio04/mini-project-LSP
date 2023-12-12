<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('admin.events', compact('events'));
    }
    public function create(){
        return view('admin.events.create');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'location' => 'required|string|max:255',
            'ticket_price' => 'required',
            'total_tickets' => 'required',
            'image' => 'required',

        ]);


        $imagePath = $request->file('image')->store('events', 'public');

        Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'location' => $request->input('location'),
            'ticket_price' => $request->input('ticket_price'),
            'total_tickets' => $request->input('total_tickets'),
            'image_path' => $imagePath,
        ]);

     
        return redirect()->route('admin.events')->with('success', 'Event created successfully.');
    }
}
