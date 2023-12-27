@extends('layouts.app')

@section('content')

    <h2>Seat Allocations</h2>

    <a href="{{ route('seat_allocations.create') }}" class="btn btn-primary">Allocate Seat</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Trip</th>
                <th>Seat No</th>
                <th>Passenger Name</th>
                <th>Passenger Phone</th>
                <th>Passenger NID</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($seatAllocations as $seatAllocation)
                <tr>
                    <td>{{ $seatAllocation->id }}</td>
                    <td>{{ $seatAllocation->trip->bus_no }}</td>
                    <td>{{ $seatAllocation->seat_no }}</td>
                    <td>{{ $seatAllocation->passenger_name }}</td>
                    <td>{{ $seatAllocation->passenger_phone }}</td>
                    <td>{{ $seatAllocation->passenger_nid }}</td>
                    <td>{{ $seatAllocation->price }}</td>
                    <td>
                        <a href="{{ route('seat_allocations.edit', $seatAllocation) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('seat_allocations.destroy', $seatAllocation) }}" method="POST" class="d-inline">
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
