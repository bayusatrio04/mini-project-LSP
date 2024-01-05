<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\EventCategory;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::all();
        $eventsCount = Event::count();
        $search = $request->input('search');

        $events = Event::when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', "%$search%")
                             ->orWhere('description', 'LIKE', "%$search%")
                             ->orWhere('location', 'LIKE', "%$search%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.events', compact('events', 'eventsCount', 'search'));
    }
    public function create()
    {
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
            'video' => 'required',


        ]);


        $imagePath = $request->file('image')->store('events_img', 'public');

        $videoName = time().'.'.$request->video->extension();
        $path = $request->file('video')->storeAs('video', $videoName, 'public');
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
            'video' => $path,
        ]);

        $event->save();
        $event->categories()->attach($request->input('category_events'));


        foreach ($request->input('category_events') as $item) {


            $data = [
                'id_event'  => $event->id,
                'id_category' => $item
            ];

            EventCategory::create($data);
        }



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
        $categories = Category::all();
        return view('admin.events.update', compact('event', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category_events' => 'required|array|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'location' => 'required|string|max:255',
            'ticket_price' => 'required|numeric',
            'total_tickets' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        $event = Event::findOrFail($id);
        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('events', 'public');

            if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
                Storage::disk('public')->delete($event->image_path);
            }

            $event->image_path = $imagePath;
        }
        $event->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category_events' => implode(',', $request->input('category_events')),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'location' => $request->input('location'),
            'ticket_price' => $request->input('ticket_price'),
            'total_tickets' => $request->input('total_tickets'),

        ]);

        $newCategoryEvents = $validatedData['category_events'];
        $existingCategoryEvents = $event->categories()->pluck('categories.id')->all();
        $categoriesToAdd = array_diff($newCategoryEvents, $existingCategoryEvents);
        foreach ($categoriesToAdd as $categoryId) {

            if (!EventCategory::where('id_event', $event->id)->where('id_category', $categoryId)->exists()) {

                EventCategory::create([
                    'id_event' => $event->id,
                    'id_category' => $categoryId,
                ]);

            }
        }



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
