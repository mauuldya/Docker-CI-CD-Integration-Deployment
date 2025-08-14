@extends('layouts.app')

@section('title', 'Home - Explore Magical Wonderful Worlds')

@section('styles')
<style>
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://source.unsplash.com/random/1600x900/?travel');
        background-size: cover;
        background-position: center;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
    }
    
    .booking-card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        margin-top: -50px;
        position: relative;
        z-index: 10;
    }
    
    .flight-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .flight-table th {
        background-color: #f8f9fa;
        text-align: left;
        padding: 12px 15px;
        font-weight: bold;
        border-bottom: 2px solid #ecf0f1;
    }
    
    .flight-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #ecf0f1;
    }
    
    .select-box {
        color: #3498db;
        font-weight: bold;
    }
</style>
@endsection

@section('content')
<div class="hero-section">
    <div class="px-4">
        <h1 class="text-4xl font-bold mb-4">Explore Magical Wonderful Worlds</h1>
        <p class="text-xl">Your truly great experience starts here with us</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="booking-card">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Book Your Next Flight</h2>
        
        <table class="flight-table">
            <thead>
                <tr>
                    <th>Departure</th>
                    <th>Destination</th>
                    <th>Date</th>
                    <th>Passengers</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="select-box"><strong>Select Departure</strong></td>
                    <td class="select-box"><strong>Select Arrival</strong></td>
                    <td>18 Nov 2024</td>
                    <td>1 people</td>
                </tr>
            </tbody>
        </table>
        
        <div class="mt-6">
            <button class="bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700 transition duration-300">
                Search Flights
            </button>
        </div>
    </div>
</div>
@endsection