<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sijago - Rasakan Bepergian dengan Nyaman!</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Font dasar untuk body */
        }

        .font-montserrat {
            font-family: 'Montserrat', sans-serif; /* Class khusus untuk font Montserrat */
        }

        .hero-section {
            background: linear-gradient(135deg, #a7c9f5 0%, #d4a3ff 100%); /* Gradasi biru muda ke ungu muda/pastel */
            min-height: 500px;
            display: flex;
            align-items: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            margin-bottom: 6rem; /* Tambahkan margin bawah untuk memberi ruang */
        }

        .hero-content-wrapper {
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .hero-text-container {
            color: white;
            width: 100%;
            max-width: 600px;
            z-index: 2;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
            @apply font-montserrat; /* Gunakan font Montserrat untuk judul */
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .airplane-container {
            width: 100%;
            max-width: 600px;
            z-index: 1;
        }

        .airplane-icon {
            width: 100%;
            height: auto;
            /* Animation bisa ditambahkan jika diperlukan */
        }

        /* Enhanced Ticket Button */
        .ticket-button {
            display: inline-flex;
            align-items: center;
            background: linear-gradient(to right, #f97316, #ea580c); /* Warna oranye seperti gambar */
            color: white;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 9999px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            @apply font-montserrat; /* Gunakan font Montserrat untuk tombol */
        }

        .ticket-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            background: linear-gradient(to right, #ea580c, #c2410c);
        }

        .ticket-button svg {
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }

        .ticket-button:hover svg {
            transform: translateX(5px);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-content-wrapper {
                flex-direction: column;
                text-align: center;
            }

            .hero-text-container,
            .airplane-container {
                width: 100%;
                max-width: 100%;
            }

            .hero-title {
                font-size: 2.5rem;
            }
        }

        /* Popular This Year Section */
        .popular-section {
            padding: 2rem;
            text-align: center;
        }

        .popular-title {
            font-size: 2rem;
            font-weight: 700;
            color: #374151; /* Warna abu-abu gelap */
            margin-bottom: 1rem;
            @apply font-montserrat;
        }

        .popular-subtitle {
            color: #6b7280; /* Warna abu-abu sedang */
            margin-bottom: 2rem;
        }

        .popular-destinations {
            display: flex;
            overflow-x: auto; /* Membuat scroll horizontal jika terlalu banyak item */
            gap: 1.5rem;
            padding: 1rem 0;
            justify-content: center; /* Pusatkan item */
        }

        .destination-card {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            width: 250px; /* Sesuaikan lebar card */
            flex-shrink: 0; /* Agar card tidak mengecil */
        }

        .destination-image {
            width: 100%;
            height: 150px; /* Sesuaikan tinggi gambar */
            object-fit: cover;
        }

        .destination-info {
            padding: 1rem;
            text-align: left;
        }

        .destination-airport {
            font-weight: 600;
            color: #1e3a8a; /* Warna biru tua */
            margin-bottom: 0.5rem;
            @apply font-montserrat;
        }

        .destination-location {
            color: #4b5563; /* Warna abu-abu gelap */
            font-size: 0.9rem;
        }

        .destination-code {
            color: #718096; /* Warna abu-abu sedang */
            font-size: 0.8rem;
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
                <a href="#" class="text-gray-700 hover:text-blue-600 font-semibold transition">Home</a>
                <a href="#popular" class="text-gray-700 hover:text-blue-600 font-semibold transition">Popular</a>
                <a href="#information" class="text-gray-700 hover:text-blue-600 font-semibold transition">Information</a>
                <a href="flights" class="text-gray-700 hover:text-blue-600 font-semibold transition">Flights</a>
            </div>
            <div class="hidden md:flex space-x-2">
                <a href="{{ route('user.register') }}" class="bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-gray-900 font-semibold py-2 px-6 rounded-full shadow-md transition-all font-montserrat">
                    Sign Up 
                </a>
                <a href="{{ route('login') }}" class="bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-gray-900 font-semibold py-2 px-6 rounded-full shadow-md transition-all font-montserrat">
                    Sign In
                </a>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero-section">
            <div class="container mx-auto">
                <div class="hero-content-wrapper">
                    <div class="hero-text-container">
                        <h1 class="hero-title">Rasakan Bepergian dengan Nyaman!</h1>
                        <p class="text-lg text-white/90 mb-8 max-w-lg">
                            Dengan SIJAGo liburan tanpa ribet mikirin budget!
                        </p>
                        
                        @auth('user')
                            <a href="/flights" class="ticket-button">
                                Pilih Tiket Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @else
                            <a href="/flights" class="ticket-button">
                                Pilih Tiket Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endauth
                    </div>

                    <div class="airplane-container">
                        <img src="{{ asset('images/airplanes.png') }}" alt="Airplane" class="airplane-icon">
                    </div>
                </div>
            </div>

            <div class="absolute bottom-0 left-0 w-full h-20 bg-white/10 backdrop-blur-sm"></div>
        </section>

        <section id="popular" class="popular-section">
            <h2 class="popular-title">Popular This Year</h2>
            <p class="popular-subtitle">Pilih Perjalanan yang paling Populer</p>
            <div class="popular-destinations">
                <div class="destination-card">
                    <img src="{{ asset('images/beijing.jpg') }}" alt="Beijing Capital International Airport" class="destination-image">
                    <div class="destination-info">
                        <h3 class="destination-airport">Beijing Capital International Airport</h3>
                        <p class="destination-code">(PEK)</p>
                        <p class="destination-location">Sanghai</p>
                    </div>
                </div>
                <div class="destination-card">
                    <img src="{{ asset('images/bali.jpg') }}" alt="I Gusti Ngurah Rai International Airport" class="destination-image">
                    <div class="destination-info">
                        <h3 class="destination-airport">I Gusti Ngurah Rai International Airport</h3>
                        <p class="destination-code">(DPS)</p>
                        <p class="destination-location">Bali</p>
                    </div>
                </div>
                <div class="destination-card">
                    <img src="{{ asset('images/tokyo.jpg') }}" alt="Haneda Airport" class="destination-image">
                    <div class="destination-info">
                        <h3 class="destination-airport">Haneda Airport</h3>
                        <p class="destination-code">(HND)</p>
                        <p class="destination-location">Tokyo</p>
                    </div>
                </div>
                <div class="destination-card">
                    <img src="{{ asset('images/jeddah.jpg') }}" alt="King Abdulaziz International Airport" class="destination-image">
                    <div class="destination-info">
                        <h3 class="destination-airport">King Abdulaziz International Airport</h3>
                        <p class="destination-code">(JED)</p>
                        <p class="destination-location">Jeddah</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="information" class="bg-gray-800 text-white py-12">
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