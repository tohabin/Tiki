@extends('layouts.app')

@section('content')

    <h2>Trips</h2>

    <a href="{{ route('trips.create') }}" class="btn btn-primary">Create Trip</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Bus No</th>
                <th>Driver</th>
                <th>Location</th>
                <th>Depart Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trips as $trip)
                <tr>
                    <td>{{ $trip->id }}</td>
                    <td>{{ $trip->bus_no }}</td>
                    <td>{{ $trip->driver->name }}</td>
                    <td>{{ $trip->location->from }} to {{ $trip->location->to }}</td>
                    <td>{{ $trip->depart_time }}</td>
                    <td>
                        <a href="{{ route('trips.edit', $trip) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('trips.destroy', $trip) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
