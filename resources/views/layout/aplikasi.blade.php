<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIJAGo - Sistem Informasi Jadwal Penerbangan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto py-4 px-6 flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 mr-3">
                <span class="font-bold text-2xl text-gray-800 font-montserrat">SIJAGo</span>
            </div>
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('welcome') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition">Home</a>
                <a href="#popular" class="text-gray-700 hover:text-blue-600 font-semibold transition">Popular</a>
                <a href="#information" class="text-gray-700 hover:text-blue-600 font-semibold transition">Information</a>
                <a href="{{ url('/flights') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition">Flights</a>
            </div>
            <div class="hidden md:flex space-x-2">
                <a href="{{ route('user.register') }}" class="bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-gray-900 font-semibold py-2 px-6 rounded-full shadow-md transition-all font-montserrat">
                    Sign Up 
                </a>
                <a href="{{ route('user.login') }}" class="bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-gray-900 font-semibold py-2 px-6 rounded-full shadow-md transition-all font-montserrat">
                    Sign In
                </a>
            </div>
        </nav>
    </header>

    <main>
        @yield('konten')
    </main>

    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <div class="flex items-center">
                        <img src="{{ asset('images/logo-white.png') }}" alt="Logo" class="h-8 mr-2">
                        <span class="font-bold text-xl font-montserrat">SIJAGo</span>
                    </div>
                    <p class="mt-2 text-gray-400">Perjalanan tak terlupakan dimulai dari sini.</p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="font-semibold mb-4 font-montserrat">Tentang Kami</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Jurusan:SIJA</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Karir:Pelajar</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Blog:XII SIJA A</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-4 font-montserrat">Layanan</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Tiket Pesawat</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Hotel</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Paket Wisata</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-4 font-montserrat">Bantuan</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Kontak</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Kebijakan Privasi</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-4 font-montserrat">Kontak</h3>
                        <ul class="space-y-2">
                            <li class="text-gray-400">info@sijago.com</li>
                            <li class="text-gray-400">+62 123 4567 890</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Sijago. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html> 