<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_no',
        'driver_id',
        'location_id',
        'depart_time',
    ];

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function seatAllocations()
    {
        return $this->hasMany(SeatAllocation::class, 'trip_id');
    }
}
