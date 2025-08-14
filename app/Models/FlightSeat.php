<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FlightSeat extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_id',
        'name',
        'row',
        'column',
        'class_type',
        'is_available', 
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
