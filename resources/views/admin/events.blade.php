@extends('layouts.app-admin')

@section('title', 'Products')

@section('content')
<section class="col-md-10">
    <div class="card">
        <div class="row">
            <div class="col-md-9">

                <div class="my-4 mx-3">
                    <h1 class="h2 color-primary">Events</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboards') }}">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Events</li>
                        </ol>
                    </nav>

                </div>
            </div>
            <div class="col-md-2">
                <div class="my-4 mx-3 col-xl-12 col-lg-6 col-md-12 col-12">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0 bad"><span class="badge bg-info">Events</span></h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-primary text-info rounded-2">
                                <i class="bi-journal-richtext"></i>
                            </div>
                        </div>
                        <div class="align-center offset-md-4">
                            <h5 class="fw-bold">{{ $eventsCount }}</h5>

                        </div>
                    </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <hr>
    <div class="d-flex mb-3">

        <a href="{{ route('events.create') }}" class="btn btn-primary">Create Event +</a>
    </div>
    <div class="card p-3 mb-3">

        <div class="p-3 table table">
            <form action="{{ route('admin.events') }}" method="GET" class="form-inline d-flex gap-3">
                <input type="text" name="search" class="form-control" placeholder="Search">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

    @if(isset($search))
        <div class="alert alert-info" role="alert">
            Showing results for: <strong>{{ $search }}</strong>
        </div>
    @endif

    @if(count($events) > 0)
    <table class="table caption-top table-striped table-hover table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">End Date</th>
                <th scope="col">Quantity Tickets</th>
                <th scope="col">Ticket Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
                <tr>
                    <th scope="row">{{ $event->id }}</th>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->end_date }}</td>
                    <td>{{ $event->total_tickets }}</td>
                    <td>{{ 'Rp ' . number_format($event->ticket_price, 0, ',', '.') }}</td>
                    <td class="ms-3 mt-3">
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-outline-info fs-5" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="View Details">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-outline-warning fs-5" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Update Events">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger ms-0"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Delete Events">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        <div class="alert alert-danger" role="alert">
                            No events found.
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @endif

    </div>
</section>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });


</script>
@endsection
