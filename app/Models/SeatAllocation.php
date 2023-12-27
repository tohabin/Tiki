<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatAllocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'seat_no',
        'passenger_name',
        'passenger_phone',
        'passenger_nid',
        'price',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
    

}
