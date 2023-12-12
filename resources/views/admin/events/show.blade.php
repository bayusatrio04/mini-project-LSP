<!-- resources/views/events/show.blade.php -->
@extends('layouts.app-admin')

@section('title', $event->title)

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <img src="{{ asset('storage/' . $event->image_path) }}" class="card-img-top" alt="{{ $event->title }}">
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
                            <li class="list-group-item"><strong>Category :</strong> {{ $event->category }}</li>
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
