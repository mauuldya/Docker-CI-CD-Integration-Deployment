@extends('layout.aplikasi')

@section('konten')
<div class="min-h-screen bg-gradient-to-b from-blue-100 to-purple-100 py-10">
    <div class="container mx-auto px-4 flex flex-col md:flex-row gap-8">
        <!-- Left: Flight & Transaction Info -->
        <div class="md:w-1/2 space-y-8">
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-xl font-bold mb-4">Your Flight</h2>
                <div class="flex justify-between mb-2">
                    <div>
                        <div class="font-semibold">Departure</div>
                        <div>{{ $flight->segments->first()->airport->name ?? '-' }} ({{ $flight->segments->first()->airport->iata_code ?? '-' }})</div>
                    </div>
                    <div>
                        <div class="font-semibold">Arrival</div>
                        <div>{{ $flight->segments->last()->airport->name ?? '-' }} ({{ $flight->segments->last()->airport->iata_code ?? '-' }})</div>
                    </div>
                </div>
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="font-semibold">Date</div>
                        <div>{{ \Carbon\Carbon::parse($flight->segments->first()->time)->format('d F y') }}</div>
                    </div>
                    <div>
                        <div class="font-semibold">Quantity</div>
                        <div>{{ $quantity }} people</div>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        @if($flight->airline && $flight->airline->logo)
                            <img src="{{ asset($flight->airline->logo) }}" alt="{{ $flight->airline->name }}" class="h-8">
                        @endif
                        <div>
                            <div class="font-bold">{{ $flight->airline->name ?? '-' }}</div>
                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($flight->segments->first()->time)->format('H:i') }} - {{ \Carbon\Carbon::parse($flight->segments->last()->time)->format('H:i') }}</div>
                        </div>
                    </div>
                    <a href="#" class="bg-purple-900 text-white px-4 py-2 rounded-lg font-semibold">Details</a>
                </div>
                <div class="flex items-center mb-4">
                    <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80" class="rounded-xl w-20 h-16 object-cover mr-4" alt="{{ ucfirst($class->class_type) }} Class">
                    <div>
                        <div class="font-bold">{{ ucfirst($class->class_type) }} Class</div>
                        <div class="text-purple-900 font-bold">Rp. {{ number_format($class->price, 0, ',', '.') }}</div>
                    </div>
                </div>
                <div class="text-sm text-gray-700 mb-2">{{ $flight->segments->count() > 1 ? ($flight->segments->count() - 1 . 'x Transit') : 'Direct Flight' }}</div>
                <div class="text-sm text-gray-700 mb-4">{{ $flight->segments->first()->airport->iata_code ?? '-' }} o-○-o {{ $flight->segments->last()->airport->iata_code ?? '-' }}</div>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-xl font-bold mb-4">Transaction Details</h2>
                <div class="flex flex-wrap gap-6 mb-2">
                    <div>
                        <div class="font-semibold">Quantity</div>
                        <div>{{ $quantity }} People</div>
                    </div>
                    <div>
                        <div class="font-semibold">Tiers</div>
                        <div>{{ ucfirst($class->class_type) }}</div>
                    </div>
                    <div>
                        <div class="font-semibold">Seats</div>
                        <div>{{ implode(', ', $selectedSeats) }}</div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-6 mb-2">
                    <div>
                        <div class="font-semibold">Price</div>
                        <div>Rp {{ number_format($class->price, 0, ',', '.') }}</div>
                    </div>
                    <div>
                        <div class="font-semibold">Govt. Tax</div>
                        <div>11%</div>
                    </div>
                    <div>
                        <div class="font-semibold">Sub Total</div>
                        <div>Rp {{ number_format($subTotal, 0, ',', '.') }}</div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-6 mb-2">
                    <div>
                        <div class="font-semibold">Total Tax</div>
                        <div>Rp {{ number_format($totalTax, 0, ',', '.') }}</div>
                    </div>
                    <div>
                        <div class="font-semibold text-blue-700">Grand Total</div>
                        <div class="font-bold text-blue-700 text-lg">Rp {{ number_format($grandTotal, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right: Seat Map -->
        <div class="md:w-1/2 flex flex-col items-center">
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8 w-full flex flex-col items-center">
                <div class="grid grid-cols-4 gap-6">
                    @foreach($seats as $seat)
                        <button class="w-14 h-14 rounded-full border-2 border-yellow-400 flex items-center justify-center text-lg font-bold mb-2 {{ !$seat->is_available ? 'bg-gray-300 text-gray-400 border-gray-300 cursor-not-allowed' : 'bg-white hover:bg-yellow-100' }}">
                            {{ $seat->name }}
                        </button>
                    @endforeach
                </div>
            </div>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-bold text-lg w-full">Continue Booking</button>
        </div>
    </div>
</div>
@endsection 