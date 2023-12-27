@extends('layouts.app')

@section('content')

    <h2>Dashboard</h2>

    @if($nextSevenDaysTrips->isEmpty())
        <p>No upcoming trips in the next 7 days.</p>
    @else
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Bus No</th>
                    <th>Departure Time</th>
                    <th>Available Seats</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nextSevenDaysTrips as $trip)
                    <tr>
                        <td>{{ $trip->bus_no }}</td>
                        <td>{{ $trip->depart_time }}</td>
                        <td>{{ $trip->seat_capacity - $trip->seat_allocations_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
