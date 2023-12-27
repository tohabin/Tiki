@extends('layouts.app')

@section('content')

    <h2>{{ isset($location) ? 'Edit Location' : 'Create Location' }}</h2>

    <form action="{{ isset($location) ? route('locations.update', $location) : route('locations.store') }}" method="POST">
        @csrf
        @if(isset($location))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="from" class="form-label">From</label>
            <input type="text" class="form-control" id="from" name="from" value="{{ old('from', $location->from ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="to" class="form-label">To</label>
            <input type="text" class="form-control" id="to" name="to" value="{{ old('to', $location->to ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="approx_cost" class="form-label">Approx Cost</label>
            <input type="number" class="form-control" id="approx_cost" name="approx_cost" value="{{ old('approx_cost', $location->approx_cost ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="approx_time" class="form-label">Approx Time</label>
            <input type="datetime-local" class="form-control" id="approx_time" name="approx_time" value="{{ old('approx_time', $location->approx_time ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
