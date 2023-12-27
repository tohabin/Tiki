<?php

namespace App\Http\Controllers;

use App\Models\SeatAllocation;
use App\Models\Trip;
use Illuminate\Http\Request;

class SeatAllocationController extends Controller
{
    public function index()
    {
        $seatAllocations = SeatAllocation::with('trip')->get();
        return view('seat_allocations.index', compact('seatAllocations'));
    }

    public function create()
    {
        $trips = Trip::all();
        return view('seat_allocations.form', compact('trips'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'seat_no' => 'required|integer',
            'passenger_name' => 'required|string|max:255',
            'passenger_phone' => 'required|string|max:255',
            'passenger_nid' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        SeatAllocation::create($validatedData);

        return redirect()->route('seat_allocations.index')->with('success', 'Seat Allocation created successfully.');
    }

    public function edit(SeatAllocation $seatAllocation)
    {
        $trips = Trip::all();
        return view('seat_allocations.form', compact('seatAllocation', 'trips'));
    }

    public function update(Request $request, SeatAllocation $seatAllocation)
    {
        $validatedData = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'seat_no' => 'required|integer',
            'passenger_name' => 'required|string|max:255',
            'passenger_phone' => 'required|string|max:255',
            'passenger_nid' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $seatAllocation->update($validatedData);

        return redirect()->route('seat_allocations.index')->with('success', 'Seat Allocation updated successfully.');
    }

    public function destroy(SeatAllocation $seatAllocation)
    {
        $seatAllocation->delete();

        return redirect()->route('seat_allocations.index')->with('success', 'Seat Allocation deleted successfully.');
    }
}
