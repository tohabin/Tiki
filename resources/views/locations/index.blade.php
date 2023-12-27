@extends('layouts.app')

@section('content')

    <h2>Locations</h2>

    <a href="{{ route('locations.create') }}" class="btn btn-primary">Create Location</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>From</th>
                <th>To</th>
                <th>Approx Cost</th>
                <th>Approx Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
                <tr>
                    <td>{{ $location->id }}</td>
                    <td>{{ $location->from }}</td>
                    <td>{{ $location->to }}</td>
                    <td>{{ $location->approx_cost }}</td>
                    <td>{{ $location->approx_time }}</td>
                    <td>
                        <a href="{{ route('locations.edit', $location) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('locations.destroy', $location) }}" method="POST" class="d-inline">
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
