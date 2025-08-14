<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\FlightClass;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'description', 
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('images/logo.png');
    }

    public function classes()
    {
        return $this->belongsToMany(FlightClass::class, 'flight_class_facility', 'facility_id', 'flight_class_id');
    }
}
