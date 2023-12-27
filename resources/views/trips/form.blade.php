@extends('layouts.app')

@section('content')

    <h2>{{ isset($trip) ? 'Edit Trip' : 'Create Trip' }}</h2>

    <form action="{{ isset($trip) ? route('trips.update', $trip) : route('trips.store') }}" method="POST">
        @csrf
        @if(isset($trip))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="bus_no" class="form-label">Bus No</label>
            <input type="text" class="form-control" id="bus_no" name="bus_no" value="{{ old('bus_no', $trip->bus_no ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="driver_id" class="form-label">Driver</label>
            <select class="form-control" id="driver_id" name="driver_id" required>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}" {{ isset($trip) && $trip->driver_id == $driver->id ? 'selected' : '' }}>
                        {{ $driver->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="location_id" class="form-label">Location</label>
            <select class="form-control" id="location_id" name="location_id" required>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}" {{ isset($trip) && $trip->location_id == $location->id ? 'selected' : '' }}>
                        {{ $location->from }} to {{ $location->to }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="depart_time" class="form-label">Depart Time</label>
            <input type="datetime-local" class="form-control" id="depart_time" name="depart_time" value="{{ old('depart_time', $trip->depart_time ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
