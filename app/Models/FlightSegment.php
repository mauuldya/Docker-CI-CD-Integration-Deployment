<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class FlightSegment extends Model
{
    use HasFactory;

    protected $fillable = [
        'sequence',
        'flight_id',
        'airport_id',
        'time' 
    ];

    public function flight()
        {
            return $this->belongsTo(Flight::class);
        }
    
    public function airport()
        {
            return $this->belongsTo(Airport::class, 'airport_id'); // foreign key ada di flight_segments
        }
}
