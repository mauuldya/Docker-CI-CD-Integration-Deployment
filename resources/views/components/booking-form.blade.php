<div class="mt-8 bg-white p-6 rounded-lg shadow-md">
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="origin" class="block text-sm font-medium text-gray-700">Asal</label>
                <select id="origin" name="origin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="CGK">Jakarta (CGK)</option>
                    <option value="DPS">Bali (DPS)</option>
                </select>
            </div>
            
            <div>
                <label for="destination" class="block text-sm font-medium text-gray-700">Tujuan</label>
                <select id="destination" name="destination" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="DPS">Bali (DPS)</option>
                    <option value="CGK">Jakarta (CGK)</option>
                </select>
            </div>
            
            <div>
                <label for="departure_date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" id="departure_date" name="departure_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
        </div>
        
        <button type="submit" class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300">
            Cari Penerbangan
        </button>
    </form>
</div>