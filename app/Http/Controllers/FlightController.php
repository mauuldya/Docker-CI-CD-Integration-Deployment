<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Airline;
use App\Models\Facility;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        // Ambil semua data flight beserta relasi airline, segments, classes, dan facilities
        $flights = Flight::with(['airline', 'segments.airport', 'classes.facilities'])->get();
        // Ambil semua airlines unik dan semua facilities untuk filter
        $airlines = Airline::all();
        $facilities = Facility::all();
        return view('flights.index', compact('flights', 'airlines', 'facilities'));
    }

    public function chooseTier($flightId)
    {
        $flight = \App\Models\Flight::with(['airline', 'segments.airport', 'classes.facilities'])->findOrFail($flightId);
        return view('flights.choose-tier', compact('flight'));
    }

    public function chooseSeat($flightId, \Illuminate\Http\Request $request)
    {
        $classType = $request->get('class', 'economy');
        $flight = \App\Models\Flight::with(['classes.seats'])->findOrFail($flightId);
        $class = $flight->classes->firstWhere('class_type', $classType);
        $seats = $class ? $class->seats : collect();
        // Dummy data untuk detail transaksi
        $quantity = 1;
        $selectedSeats = [];
        $tax = 0.11;
        $subTotal = $class ? $class->price * $quantity : 0;
        $totalTax = $subTotal * $tax;
        $grandTotal = $subTotal + $totalTax;
        return view('flights.choose-seat', compact('flight', 'class', 'seats', 'quantity', 'selectedSeats', 'subTotal', 'totalTax', 'grandTotal'));
    }
} 