<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Airport extends Model
{
    use HasFactory;

    protected $fillable = [
        'iata_code',
        'name',
        'image',
        'city',
        'country',
    ];
    
    public function segments()
    {
        return $this->hasMany(FlightSegment::class);
    }
}   
