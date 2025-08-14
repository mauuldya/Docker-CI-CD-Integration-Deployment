@extends('layout.aplikasi')

@section('konten')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:space-x-8">
            <!-- Sidebar Filters -->
            <div class="w-full md:w-1/3 mb-8 md:mb-0">
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-xl font-bold mb-6">Filters Ticket</h2>
                    <div class="mb-6">
                        <p class="font-semibold mb-2">Flights</p>
                        <div class="space-y-2">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="form-checkbox">
                                <span>Direct Flight</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="form-checkbox">
                                <span>Transit 1x</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="form-checkbox">
                                <span>Transit 2x</span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-6">
                        <p class="font-semibold mb-2">Airlines</p>
                        <div class="space-y-2">
                            @foreach($airlines as $airline)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="form-checkbox">
                                    @if($airline->logo)
                                        <img src="{{ asset('images/airplane.jpg') }}" 
                                             alt="{{ $airline->name }}" 
                                             class="h-5 w-auto object-contain"
                                             onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';">
                                    @endif
                                    <span>{{ $airline->name }} <span class="text-xs text-gray-400">Available</span></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold mb-2">Facilities</p>
                        <div class="space-y-2">
                            @foreach($facilities as $facility)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" class="form-checkbox">
                                    @if($facility->image)
                                        <img src="{{ asset('images/' . $facility->image) }}" 
                                             alt="{{ $facility->name }}" 
                                             class="h-5 w-5 object-contain"
                                             onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';">
                                    @endif
                                    <span>{{ $facility->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Content -->
            <div class="w-full md:w-2/3">
                <div class="bg-white rounded-xl shadow p-8 mb-6">
                    <h1 class="text-3xl font-bold mb-6">Flight Search</h1>
                    <div class="flex flex-wrap gap-4 mb-6">
                        <div class="bg-gray-100 rounded-lg px-4 py-2 flex flex-col items-center">
                            <span class="text-xs text-gray-500">Departure</span>
                            <span class="font-bold text-lg">{{ request('departure', '-') }}</span>
                        </div>
                        <div class="bg-gray-100 rounded-lg px-4 py-2 flex flex-col items-center">
                            <span class="text-xs text-gray-500">Arrival</span>
                            <span class="font-bold text-lg">{{ request('arrival', '-') }}</span>
                        </div>
                        <div class="bg-gray-100 rounded-lg px-4 py-2 flex flex-col items-center">
                            <span class="text-xs text-gray-500">Date</span>
                            <span class="font-bold text-lg">{{ request('date', '-') }}</span>
                        </div>
                        <div class="bg-gray-100 rounded-lg px-4 py-2 flex flex-col items-center">
                            <span class="text-xs text-gray-500">Quantity</span>
                            <span class="font-bold text-lg">{{ request('quantity', '-') }} people</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow p-8">
                    <h2 class="text-xl font-bold mb-4">Available Flights</h2>
                    @forelse($flights as $flight)
                        <div class="border rounded-lg p-6 flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                            <div class="flex items-center space-x-4 mb-4 md:mb-0">
                                @if($flight->airline && $flight->airline->logo)
                                    <img src="{{ asset('images/airplane.jpg') }}" 
                                         alt="{{ $flight->airline->name }}" 
                                         class="h-8 w-auto object-contain"
                                         onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';">
                                @endif
                                <div>
                                    <div class="font-bold">{{ $flight->airline->name ?? '-' }}</div>
                                    <div class="text-xs text-gray-500">{{ $flight->flight_number }}</div>
                                    @if($flight->segments->count() > 1)
                                        <div class="text-xs text-gray-500">Transit {{ $flight->segments->count() - 1 }}x</div>
                                    @else
                                        <div class="text-xs text-gray-500">Direct Flight</div>
                                    @endif
                                </div>
                            </div>
                            <div class="text-green-600 font-bold text-lg mb-4 md:mb-0">
                                @php
                                    $minPrice = $flight->classes->min('price');
                                @endphp
                                Rp. {{ number_format($minPrice, 0, ',', '.') }}
                            </div>
                            <a href="{{ route('flights.chooseTier', $flight->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold">Choose</a>
                        </div>
                        <div class="flex flex-col md:flex-row md:space-x-8 mb-8">
                            @foreach($flight->segments as $segment)
                                <div class="flex-1 mb-4 md:mb-0">
                                    <div class="flex items-center space-x-2 mb-2">
                                        <span class="text-lg font-bold">
                                            {{ \Carbon\Carbon::parse($segment->time)->format('H:i') }}
                                        </span>
                                        <span class="text-xs text-gray-500">
                                            {{ \Carbon\Carbon::parse($segment->time)->format('d M Y') }}
                                        </span>
                                    </div>
                                    <div class="text-sm font-semibold">
                                        {{ $loop->first ? 'Departure' : 'Transit' }}
                                    </div>
                                    <div class="text-gray-600 mb-2">
                                        {{ $segment->airport->name ?? '-' }} ({{ $segment->airport->iata_code ?? '-' }})
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Facilities -->
                        @php
                            $allFacilities = collect();
                            foreach ($flight->classes as $class) {
                                $allFacilities = $allFacilities->merge($class->facilities);
                            }
                            $allFacilities = $allFacilities->unique('id');
                        @endphp
                        @if($allFacilities->count())
                        <div class="mb-8">
                            <h3 class="font-semibold mb-2">Facilities:</h3>
                            <div class="flex flex-wrap gap-4">
                                @foreach($allFacilities as $facility)
                                    <div class="flex flex-col items-center bg-white border border-gray-200 shadow-sm rounded-lg px-4 py-3 w-32 h-32 justify-center hover:shadow-md transition">
                                        @if($facility->image)
                                            <img src="{{ asset('images/' . $facility->image) }}" 
                                                 alt="{{ $facility->name }}" 
                                                 class="h-12 w-12 object-contain mb-2"
                                                 onerror="this.onerror=null; this.src='{{ asset('images/logo.png') }}';">
                                        @else
                                            <div class="h-12 w-12 bg-gray-200 rounded mb-2 flex items-center justify-center">
                                                <span class="text-gray-400 text-xs">No Image</span>
                                            </div>
                                        @endif
                                        <span class="text-sm font-semibold text-center">{{ $facility->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    @empty
                        <div class="text-gray-500">No flights found.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 