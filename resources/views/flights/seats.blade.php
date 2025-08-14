<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Kursi - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Gaya Kustom untuk Kursi */
        .kursi {
            width: 50px;
            height: 50px;
            margin: 5px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 600;
        }
        
        .kursi:hover {
            transform: scale(1.05);
        }
        
        .tersedia {
            background-color: #e2e8f0;
            color: #4a5568;
        }
        
        .terisi {
            background-color: #fed7d7;
            color: #e53e3e;
            cursor: not-allowed;
        }
        
        .terpilih {
            background-color: #c6f6d5;
            color: #38a169;
        }
        
        .legenda-item {
            display: inline-flex;
            align-items: center;
            margin-right: 15px;
        }
        
        .warna-legenda {
            width: 20px;
            height: 20px;
            border-radius: 4px;
            margin-right: 5px;
            display: inline-block;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8 px-4 max-w-4xl">
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Pilih Kursi Anda</h1>
            
            <!-- Informasi Penerbangan -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Penerbangan Anda</h2>
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-medium text-gray-900">DPS → JED</p>
                        <p class="text-gray-600">Bandara Internasional I Gusti Ngurah Rai (DPS)</p>
                    </div>
                    <div class="text-right">
                        <p class="text-gray-600">Tanggal</p>
                        <p class="font-medium text-gray-900">16 November 24</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-200 my-4"></div>
            
            <!-- Informasi Tujuan -->
            <div class="mb-8">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-medium text-gray-900">Bandara Internasional King Abdulaziz (JED)</p>
                    </div>
                    <div class="text-right">
                        <p class="text-gray-600">Jumlah Penumpang</p>
                        <p class="font-medium text-gray-900">3 orang</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-200 my-4"></div>
            
            <!-- Pemilihan Kursi -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Kelas Bisnis</h2>
                
                <!-- Legenda -->
                <div class="flex mb-6">
                    <div class="legenda-item">
                        <span class="warna-legenda bg-gray-200"></span>
                        <span class="text-sm text-gray-600">Tersedia</span>
                    </div>
                    <div class="legenda-item">
                        <span class="warna-legenda bg-red-200"></span>
                        <span class="text-sm text-gray-600">Terisi</span>
                    </div>
                    <div class="legenda-item">
                        <span class="warna-legenda bg-green-200"></span>
                        <span class="text-sm text-gray-600">Terpilih</span>
                    </div>
                </div>
                
                <!-- Denah Kursi -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="text-center mb-4">
                        <div class="w-3/4 h-8 bg-blue-100 mx-auto rounded-t-lg flex items-center justify-center text-sm text-blue-800">
                            Depan Kabin
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-4 gap-4 justify-items-center">
                        <!-- Baris A -->
                        <div class="kursi tersedia" data-kursi="A1">A1</div>
                        <div class="kursi tersedia" data-kursi="A2">A2</div>
                        <div class="kursi terisi" data-kursi="A3">A3</div>
                        <div class="kursi tersedia" data-kursi="A4">A4</div>
                        
                        <!-- Baris B -->
                        <div class="kursi terisi" data-kursi="B1">B1</div>
                        <div class="kursi tersedia" data-kursi="B2">B2</div>
                        <div class="kursi tersedia" data-kursi="B3">B3</div>
                        <div class="kursi terisi" data-kursi="B4">B4</div>
                        
                        <!-- Baris C -->
                        <div class="kursi tersedia" data-kursi="C1">C1</div>
                        <div class="kursi terpilih" data-kursi="C2">C2</div>
                        <div class="kursi terpilih" data-kursi="C3">C3</div>
                        <div class="kursi terpilih" data-kursi="C4">C4</div>
                        
                        <!-- Baris D -->
                        <div class="kursi tersedia" data-kursi="D1">D1</div>
                        <div class="kursi tersedia" data-kursi="D2">D2</div>
                        <div class="kursi tersedia" data-kursi="D3">D3</div>
                        <div class="kursi tersedia" data-kursi="D4">D4</div>
                        
                        <!-- Baris E -->
                        <div class="kursi tersedia" data-kursi="E1">E1</div>
                        <div class="kursi tersedia" data-kursi="E2">E2</div>
                        <div class="kursi tersedia" data-kursi="E3">E3</div>
                        <div class="kursi tersedia" data-kursi="E4">E4</div>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-200 my-4"></div>
            
            <!-- Informasi Harga -->
            <div>
                <h2 class="text-xl font-semibold text-gray-700 mb-4">RINCIAN</h2>
                <div class="flex justify-between items-center mb-2">
                    <p class="text-gray-600">Maskapai</p>
                    <p class="font-medium">ESG - ISO</p>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <p class="text-gray-600">Durasi</p>
                    <p class="font-medium">5 Jam</p>
                </div>
                <div class="flex justify-between items-center">
                    <p class="text-gray-600">Total Harga</p>
                    <p class="font-bold text-xl text-blue-600">Rp 1.900.000</p>
                </div>
            </div>
            
            <!-- Tombol Aksi -->
            <div class="mt-8 flex justify-between">
                <button class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition">
                    Kembali
                </button>
                <button class="px-6 py-3 bg-blue-600 rounded-lg text-white font-medium hover:bg-blue-700 transition">
                    Lanjut ke Pembayaran
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const semuaKursi = document.querySelectorAll('.kursi.tersedia');
            
            semuaKursi.forEach(kursi => {
                kursi.addEventListener('click', function() {
                    if (this.classList.contains('tersedia')) {
                        this.classList.remove('tersedia');
                        this.classList.add('terpilih');
                    } else if (this.classList.contains('terpilih')) {
                        this.classList.remove('terpilih');
                        this.classList.add('tersedia');
                    }
                });
            });
        });
    </script>
</body>
</html>