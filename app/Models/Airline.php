<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Airline extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'logo',
    ];

    protected $appends = ['logo_url'];

    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            return asset('storage/' . $this->logo);
        }
        return asset('images/logo.png');
    }

    public function flights()
    {
        return $this->hasMany(Flight::class);
    }
}
