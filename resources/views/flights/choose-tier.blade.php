@extends('layout.aplikasi')

@section('konten')
<div class="min-h-screen bg-gradient-to-b from-blue-100 to-purple-100 py-10">
    <div class="container mx-auto px-4">
        <a href="{{ url('/flights') }}" class="inline-flex items-center mb-6 px-5 py-2 bg-white text-purple-900 font-semibold rounded-full shadow hover:bg-purple-100 transition border border-purple-200">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
            Back to Choose Flight
        </a>
        <h1 class="text-4xl font-bold mb-8 text-purple-900">Choose Tiers</h1>
        <div class="flex flex-col md:flex-row md:space-x-8">
            <!-- Flight Info -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8 md:mb-0 md:w-1/2">
                <h2 class="text-xl font-bold mb-4">Your Flight</h2>
                <div class="mb-4">
                    <div class="flex justify-between">
                        <div>
                            <div class="font-semibold">Departure</div>
                            <div>{{ $flight->segments->first()->airport->name ?? '-' }} ({{ $flight->segments->first()->airport->iata_code ?? '-' }})</div>
                        </div>
                        <div>
                            <div class="font-semibold">Arrival</div>
                            <div>{{ $flight->segments->last()->airport->name ?? '-' }} ({{ $flight->segments->last()->airport->iata_code ?? '-' }})</div>
                        </div>
                    </div>
                    <div class="flex justify-between mt-2">
                        <div>
                            <div class="font-semibold">Date</div>
                            <div>{{ \Carbon\Carbon::parse($flight->segments->first()->time)->format('d F y') }}</div>
                        </div>
                        <div>
                            <div class="font-semibold">Quantity</div>
                            <div>3 people</div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        @if($flight->airline && $flight->airline->logo)
                            <img src="{{ asset('storage/' . $flight->airline->logo) }}" 
                                 alt="{{ $flight->airline->name }}" 
                                 class="h-8 w-auto object-contain"
                                 onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';">
                        @endif
                        <div>
                            <div class="font-bold">{{ $flight->airline->name ?? '-' }}</div>
                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($flight->segments->first()->time)->format('H:i') }} - {{ \Carbon\Carbon::parse($flight->segments->last()->time)->format('H:i') }}</div>
                        </div>
                    </div>
                    <a href="#" class="bg-purple-900 text-white px-4 py-2 rounded-lg font-semibold">Details</a>
                </div>
                <div class="mt-4 text-gray-700">
                    <div class="text-sm">{{ $flight->segments->count() > 1 ? ($flight->segments->count() - 1 . 'x Transit') : 'Direct Flight' }}</div>
                    <div class="text-sm">{{ $flight->segments->first()->airport->iata_code ?? '-' }} o-○-o {{ $flight->segments->last()->airport->iata_code ?? '-' }}</div>
                </div>
            </div>
            <!-- Tiers -->
            @php
                $businessClass = $flight->classes->firstWhere('class_type', 'bussiness');
                $economyClass = $flight->classes->firstWhere('class_type', 'economy');
            @endphp
            <div class="flex-1 flex flex-col md:flex-row gap-8">
                {{-- Business Class Card --}}
                <div class="bg-white rounded-2xl shadow-lg p-6 flex-1 flex flex-col items-center">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" class="rounded-xl w-full h-32 object-cover mb-4" alt="Business Class">
                    <div class="font-bold text-lg mb-2">Business Class</div>
                    <div class="text-2xl font-bold text-purple-900 mb-4">
                        @if($businessClass)
                            Rp. {{ number_format($businessClass->price, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="mb-4 w-full">
                        @if($businessClass)
                            @foreach($businessClass->facilities as $facility)
                                <div class="flex items-center text-gray-700 mb-2">
                                    @if($facility->image)
                                        <img src="{{ asset('storage/' . $facility->image) }}" 
                                             alt="{{ $facility->name }}" 
                                             class="h-5 w-5 object-contain mr-2"
                                             onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';">
                                    @endif
                                    <span>{{ $facility->name }}</span>
                                </div>
                            @endforeach
                        @else
                            <div class="text-gray-400 text-sm">No data</div>
                        @endif
                    </div>
                    <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2 rounded-lg font-semibold w-full text-center">Choose</a>
                </div>
                {{-- Economy Class Card --}}
                <div class="bg-white rounded-2xl shadow-lg p-6 flex-1 flex flex-col items-center">
                    <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80" class="rounded-xl w-full h-32 object-cover mb-4" alt="Economy Class">
                    <div class="font-bold text-lg mb-2">Economy Class</div>
                    <div class="text-2xl font-bold text-purple-900 mb-4">
                        @if($economyClass)
                            Rp. {{ number_format($economyClass->price, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </div>
                    <div class="mb-4 w-full">
                        @if($economyClass)
                            @foreach($economyClass->facilities as $facility)
                                <div class="flex items-center text-gray-700 mb-2">
                                    @if($facility->image)
                                        <img src="{{ asset('storage/' . $facility->image) }}" 
                                             alt="{{ $facility->name }}" 
                                             class="h-5 w-5 object-contain mr-2"
                                             onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';">
                                    @endif
                                    <span>{{ $facility->name }}</span>
                                </div>
                            @endforeach
                        @else
                            <div class="text-gray-400 text-sm">No data</div>
                        @endif
                    </div>
                    <a href="{{ url('/flight/booking/' . $flight->id . '/choose-seat') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2 rounded-lg font-semibold w-full text-center">Choose</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 