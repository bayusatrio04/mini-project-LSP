@extends('layouts.app-admin')

@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>List of Events</h2>
    <a href="{{ route('events.create') }}" class="btn btn-primary">Create Event +</a>
</div>

@if(count($events) > 0)
    <table class="table caption-top">
        <caption>List of Events</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Location</th>
                <th scope="col">Ticket Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <th scope="row">{{ $event->id }}</th>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->ticket_price }}</td>
                    <td>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-info">Read</a>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Update</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-info" role="alert">
        No events found.
    </div>
@endif

@endsection
