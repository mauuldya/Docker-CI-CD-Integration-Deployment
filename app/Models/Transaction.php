<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'flight_id',
        'flight_class_id',
        'name',
        'email',
        'phone',
        'number_of_passengers',
        'promo_code_id',
        'payment_status',
        'subtotal',
        'grandtotal',
        'passengers' // tambahkan jika menyimpan sebagai JSON
    ];

    protected $casts = [
        'passengers' => 'array', // jika menyimpan data penumpang sebagai JSON
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Generate kode transaksi otomatis
            $model->code = $model->code ?? 'TRX-' . date('Ymd') . '-' . strtoupper(Str::random(5));
            
            // Auto-calculate jumlah penumpang jika tidak diisi
            if (empty($model->number_of_passengers) && !empty($model->passengers)) {
                $model->number_of_passengers = count($model->passengers);
            }
        });
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function class()
    {
        return $this->belongsTo(FlightClass::class, 'flight_class_id');
    }

    public function promo()
    {
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }

    public function passengers()
    {
        return $this->hasMany(TransactionPassenger::class);
    }
}