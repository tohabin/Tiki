<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::with(['driver', 'location'])->get();
        return view('trips.index', compact('trips'));
    }

    public function create()
    {
        $drivers = User::where('position', 'Driver')->get();
        $locations = Location::all();
        return view('trips.form', compact('drivers', 'locations'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bus_no' => 'required|string|max:255',
            'driver_id' => 'required|exists:users,id,position,Driver',
            'location_id' => 'required|exists:locations,id',
            'depart_time' => 'required|date',
        ]);

        Trip::create($validatedData);

        return redirect()->route('trips.index')->with('success', 'Trip created successfully.');
    }

    public function edit(Trip $trip)
    {
        $drivers = User::where('position', 'Driver')->get();
        $locations = Location::all();
        return view('trips.form', compact('trip', 'drivers', 'locations'));
    }

    public function update(Request $request, Trip $trip)
    {
        $validatedData = $request->validate([
            'bus_no' => 'required|string|max:255',
            'driver_id' => 'required|exists:users,id,position,Driver',
            'location_id' => 'required|exists:locations,id',
            'depart_time' => 'required|date',
        ]);

        $trip->update($validatedData);

        return redirect()->route('trips.index')->with('success', 'Trip updated successfully.');
    }

    public function destroy(Trip $trip)
    {
        $trip->delete();

        return redirect()->route('trips.index')->with('success', 'Trip deleted successfully.');
    }
}
