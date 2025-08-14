<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\FlightSeat;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showChooseSeat($flightId)
    {
        $flight = Flight::findOrFail($flightId);
        $seats = FlightSeat::where('flight_id', $flightId)->get();
        return view('choose-seat', compact('flight', 'seats'));
    }

    public function store(Request $request)
    {
        // Validasi data (opsional, bisa disesuaikan)
        $request->validate([
            'seats' => 'required',
            'class_id' => 'required',
            'total_price' => 'required',
        ]);

        // Simpan data booking ke database (contoh, sesuaikan dengan modelmu)
        // Booking::create([
        //     'class_id' => $request->class_id,
        //     'seats' => $request->seats,
        //     'total_price' => $request->total_price,
        // ]);

        // Redirect ke halaman pendaftaran penumpang
        $flightId = $request->input('class_id'); // atau ganti sesuai kebutuhan
        return redirect()->route('booking.passengerDetails', ['flight' => $flightId]);
    }
} 