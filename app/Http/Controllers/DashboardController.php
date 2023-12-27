<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class DashboardController extends Controller
{
    public function index()
    {
        $nextSevenDaysTrips = Trip::whereBetween('depart_time', [now(), now()->addDays(7)])
            ->withCount('seatAllocations')
            ->get();

        return view('dashboard', compact('nextSevenDaysTrips'));
    }
}
