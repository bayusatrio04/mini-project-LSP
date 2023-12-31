@extends('layouts.app-admin')

@section('title', 'Update Event')

@section('content')
    <div class="container mt-5">
        <h2>Update Event</h2>

        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $event->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category" aria-label="Default select example">
                    <option value="{{ $event->category }} {{ $event->id == $event->category ? 'selected' : '' }}"> {{ $event->category_events }}</option>
                    @if ($event->category_events == "Events")
                    <option value="Concert">Change to :Concert</option>
                    @else
                    <option value="Events">Change to : Events</option>
                    @endif

                  </select>
            </div>

            <div class="mb-3" >
                <label for="subCategory" class="form-label">Termasuk dalam  <span class="fw-bold">sub Category</span> apa?</label>
                <select class="form-select" name="subCategory" id="subCategory" aria-label="Default select example">
                    <option value="{{ $event->subCategory_events }} {{ $event->id == $event->subCategory_events ? 'selected' : '' }}"> {{ $event->subCategory_events }}</option>
                    <!-- Subkategori untuk kategori "Events" -->
                    <option value="Event Workshop">Change to : Event Workshop</option>
                    <option value="Event Seminar">Change to : Event Seminar</option>
                    <option value="Event Conference">Change to : Event Conference</option>
                    <option value="Event Exhibition">Change to : Event Exhibition</option>
                    <option value="Event Networking ">Change to : Event Networking</option>
                    <option value="Concert Rock">Change to : Concert Rock</option>
                    <option value="Concert Jazz">Change to : Concert Jazz</option>
                    <option value="Concert Pop">Change to : Concert Pop</option>
                    <option value="Concert Classical">Change to : Concert Classical</option>
                    <option value="Concert EDM">Change to : Concert EDM</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d\TH:i') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{ \Carbon\Carbon::parse($event->end_date)->format('Y-m-d\TH:i') }}" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}" required>
            </div>

            <div class="mb-3">
                <label for="ticket_price" class="form-label">Ticket Price</label>
                <input type="number" class="form-control" id="ticket_price" name="ticket_price" value="{{ $event->ticket_price }}" required>
            </div>

            <div class="mb-3">
                <label for="total_tickets" class="form-label">Total Tickets</label>
                <input type="number" class="form-control" id="total_tickets" name="total_tickets" value="{{ $event->total_tickets }}" required>
            </div>
            @if($event->image_path > 0)
            <img src="{{ asset('storage/' . $event->image_path) }}" width="250" height="250" class="card-img-top" alt="{{ $event->title }}">
            <input type="text" class="form-control" id="image" name="image" value="{{ $event->image_path }}" required>
            @else
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Belum ada, Silahkan Tambahkan / update{{ $event->image_path }}</label>
                <input type="file" class="form-control" id="image" name="image"  accept="image/*">
            </div>
            @endif
            <button type="submit" class="btn btn-primary mt-3">Update Event</button>
        </form>
    </div>
@endsection
