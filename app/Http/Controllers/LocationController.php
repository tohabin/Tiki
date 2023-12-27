<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        return view('locations.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'approx_cost' => 'required|numeric',
            'approx_time' => 'required|date',
        ]);

        Location::create($validatedData);

        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    }

    public function edit(Location $location)
    {
        return view('locations.form', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $validatedData = $request->validate([
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'approx_cost' => 'required|numeric',
            'approx_time' => 'required|date',
        ]);

        $location->update($validatedData);

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }
}
