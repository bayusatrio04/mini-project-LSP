@extends('layouts.app-admin')

@section('title', 'Create Event')

@section('content')
<div class="mb-3">
    <h2>Create Event</h2>
</div>

<form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>

        {{-- <textarea name="description" id="editor" class="form-control"  rows="4" cols="50" required></textarea> --}}

    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" name="category" aria-label="Default select example">
            <option selected>Open this Categories</option>
            <option value="Events">Events</option>
            <option value="Concert">Concert</option>
           
          </select>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="datetime-local" class="form-control" id="start_date" name="start_date" required>
            </div>

        </div>
        <div class="col-md-6">
         <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="datetime-local" class="form-control" id="end_date" name="end_date" required>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" class="form-control" id="location" name="location" required>
    </div>
    <div class="mb-3">
        <label for="ticket_price" class="form-label">Ticket Price</label>
        <input type="number" class="form-control" id="ticket_price" name="ticket_price" required>
    </div>
    <div class="mb-3">
        <label for="total_tickets" class="form-label">Total Tickets</label>
        <input type="number" class="form-control" id="total_tickets" name="total_tickets" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Create Event</button>
</form>
@endsection
