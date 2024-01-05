<!-- resources/views/events/show.blade.php -->
@extends('layouts.app-admin')

@section('title', $event->title)

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <img src="{{ asset('storage/' . $event->image_path) }}" class="card-img-top mb-3" alt="{{ $event->title }}">
                    <h3>VideoFiller</h3>
                    <video width="100%" height="240" controls>
                        <source src="{{ asset('storage/' . $event->video) }}" type="video/mp4">
                    </video>
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Event Details</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Category Events :</strong>
                                @foreach(explode(',', $event->category_events) as $categoryId)
                                    @php
                                        $category = $categories->where('id', $categoryId)->first();
                                    @endphp
                                    @if($category)
                                    <span class="badge text-bg-warning">{{ $category->category_name }}</span>
                                    @endif
                                @endforeach
                            </li>


                            <li class="list-group-item"><strong>Start Date:</strong> {{ $event->start_date }}</li>
                            <li class="list-group-item"><strong>End Date:</strong> {{ $event->end_date }}</li>
                            <li class="list-group-item"><strong>Location:</strong> {{ $event->location }}</li>
                            <li class="list-group-item"><strong>Ticket Price:</strong> {{ $event->ticket_price }}</li>
                            <li class="list-group-item"><strong>Total Tickets:</strong> {{ $event->total_tickets }}</li>
                            <li class="list-group-item"><strong>Sold Tickets:</strong> {{ $event->sold_tickets }}</li>
                        </ul>
                        <a href="{{ route('admin.events') }}" class="btn btn-primary mt-3">Back to pages Events</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
