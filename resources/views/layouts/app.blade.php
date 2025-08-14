<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIJAGo Travel - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-bg {
            background-image: url("{{ asset('images/hero-bg.jpg') }}");
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" 
                         alt="SIJAGo Logo" 
                         class="h-10 w-auto">
                    <span class="ml-3 text-2xl font-bold text-blue-600">SIJAGo</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-800 hover:text-blue-600">Home</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Destinations</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Packages</a>
                    <a href="#" class="text-gray-800 hover:text-blue-600">Contact</a>
                </div>
                <div>
                    <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <img src="{{ asset('images/logo-white.png') }}" 
                         alt="SIJAGo Logo" 
                         class="h-10 w-auto mb-4">
                    <p class="text-gray-300">Your best travel partner for wonderful adventures around Indonesia.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="#" class="hover:text-blue-400 transition">Home</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">About Us</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Destinations</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Special Offers</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4">Support</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="#" class="hover:text-blue-400 transition">FAQ</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Contact</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-lg mb-4">Contact Us</h4>
                    <div class="space-y-2 text-gray-300">
                        <p class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            info@sijago.com
                        </p>
                        <p class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            +62 123 4567 890
                        </p>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>© 2023 SIJAGo Travel. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>