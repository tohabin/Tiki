@extends('layouts.app')

@section('content')

    <h2>{{ isset($seatAllocation) ? 'Edit Seat Allocation' : 'Allocate Seat' }}</h2>

    <form action="{{ isset($seatAllocation) ? route('seat_allocations.update', $seatAllocation) : route('seat_allocations.store') }}" method="POST">
        @csrf
        @if(isset($seatAllocation))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="trip_id" class="form-label">Trip</label>
            <select class="form-control" id="trip_id" name="trip_id" required>
                @foreach($trips as $trip)
                    <option value="{{ $trip->id }}" {{ isset($seatAllocation) && $seatAllocation->trip_id == $trip->id ? 'selected' : '' }}>
                        {{ $trip->bus_no }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="seat_no" class="form-label">Seat No</label>
            <input type="number" class="form-control" id="seat_no" name="seat_no" value="{{ old('seat_no', $seatAllocation->seat_no ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="passenger_name" class="form-label">Passenger Name</label>
            <input type="text" class="form-control" id="passenger_name" name="passenger_name" value="{{ old('passenger_name', $seatAllocation->passenger_name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="passenger_phone" class="form-label">Passenger Phone</label>
            <input type="text" class="form-control" id="passenger_phone" name="passenger_phone" value="{{ old('passenger_phone', $seatAllocation->passenger_phone ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="passenger_nid" class="form-label">Passenger NID</label>
            <input type="text" class="form-control" id="passenger_nid" name="passenger_nid" value="{{ old('passenger_nid', $seatAllocation->passenger_nid ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $seatAllocation->price ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
