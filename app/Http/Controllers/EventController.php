<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

use Illuminate\Support\Facades\Storage;
class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('admin.events', compact('events'));
    }
    public function create(){
        $categories = Category::all();
        return view('admin.events.create', compact('categories'));
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category_events' => 'required|array|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'location' => 'required|string|max:255',
            'ticket_price' => 'required',
            'total_tickets' => 'required',
            'image' => 'required',


        ]);


        $imagePath = $request->file('image')->store('events', 'public');

        $event = new Event([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_events' => implode(',', $request->input('category_events')),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'location' => $request->input('location'),
            'ticket_price' => $request->input('ticket_price'),
            'total_tickets' => $request->input('total_tickets'),
            'image_path' => $imagePath,
        ]);

        $event->save();
        $event->categories()->attach($request->input('category_events'));


        return redirect()->route('admin.events')->with('success', 'Event created successfully.');
    }

    public function show($id)
    {

        $event = Event::findOrFail($id);
        $categories = Category::all();
        return view('admin.events.show', compact('event', 'categories'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('admin.events.update', compact('event'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required',
            'subCategory' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'location' => 'required|string|max:255',
            'ticket_price' => 'required|numeric',
            'total_tickets' => 'required|integer',
            'image' => 'required',
        ]);

        $event = Event::findOrFail($id);

        $event->title = $validatedData['title'];
        $event->description = $validatedData['description'];
        $event->category_events = $validatedData['category'];
        $event->subCategory_events= $validatedData['subCategory'];
        $event->start_date = $validatedData['start_date'];
        $event->end_date = $validatedData['end_date'];
        $event->location = $validatedData['location'];
        $event->ticket_price = $validatedData['ticket_price'];
        $event->total_tickets = $validatedData['total_tickets'];


        if ($request->hasFile('image')) {

            if ($event->image_path) {
                Storage::delete($event->image_path);
            }


            $imagePath = $request->file('image')->store('events', 'public');


            $event->update(['image_path' => $imagePath]);
        }


        $event->save();

        return redirect()->route('events.show', ['event' => $event->id])->with('success', 'Event has been updated successfully.');

    }

    public function destroy(Event $event)
    {

        if ($event->image_path) {

            Storage::disk('public')->delete($event->image_path);
        }


        $event->delete();

        return redirect()->route('admin.events')->with('success', 'Event has been deleted successfully.');
    }
}
