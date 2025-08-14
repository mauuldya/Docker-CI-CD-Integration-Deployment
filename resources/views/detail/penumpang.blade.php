<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penumpang & Pembayaran</title>
    <style>
        :root {
            --primary: #1d2b53;
            --secondary: #3478f6;
            --light-bg: #f8f9fa;
            --border: #e0e0e0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        
        header {
            background-color: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary);
        }
        
        nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }
        
        nav a.active {
            background-color: var(--primary);
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
        }
        
        .main-content {
            display: flex;
            gap: 20px;
        }
        
        .left-section {
            flex: 2;
        }
        
        .right-section {
            flex: 1;
        }
        
        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 25px;
            margin-bottom: 20px;
        }
        
        .card-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--primary);
            border-bottom: 1px solid var(--border);
            padding-bottom: 10px;
        }
        
        .flight-info {
            margin-bottom: 15px;
        }
        
        .flight-info h3 {
            margin: 0 0 10px 0;
            font-size: 16px;
        }
        
        .flight-info p {
            margin: 5px 0;
            color: #555;
        }
        
        .info-group {
            margin-bottom: 20px;
        }
        
        .info-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .info-group input, 
        .info-group select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid var(--border);
            border-radius: 5px;
            font-size: 14px;
        }
        
        .info-group input:focus, 
        .info-group select:focus {
            outline: none;
            border-color: var(--secondary);
        }
        
        .passenger-section {
            margin-top: 30px;
        }
        
        .passenger-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .price-summary {
            background-color: var(--light-bg);
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        
        .price-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .price-total {
            font-weight: 600;
            font-size: 18px;
            border-top: 1px solid var(--border);
            padding-top: 10px;
            margin-top: 10px;
        }
        
        .btn-continue {
            background-color: var(--secondary);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
        }
        
        .btn-continue:hover {
            background-color: #2a63d3;
        }
        
        .date-input-group {
            display: flex;
            gap: 10px;
        }
        
        .date-input-group input {
            flex: 1;
        }
        
        .passenger-number {
            font-weight: 600;
            color: var(--primary);
        }
    </style>
</head>
<body>
    <a href="{{ route('flights.index') }}" class="back-btn" style="margin: 32px 0 0 32px; display: inline-block;">&larr; Back to Choose Flight</a>

    <header>
        <div class="logo">Garuda</div>
        <nav>
            <a href="#">Penerbangan</a>
            <a href="#">Hotel</a>
            <a href="#">Jadwal</a>
            <a href="#">Testimoni</a>
            <a href="#" class="active">Pesanan Saya</a>
        </nav>
    </header>

    <div class="container">
        <div class="main-content">
            <div class="left-section">
                <div class="card">
                    <h2 class="card-title">Detail Penumpang</h2>
                    
                    <div class="flight-info">
                        <h3>Penerbangan Anda</h3>
                        <p><strong>Keberangkatan:</strong> I Gusti Ngurah Rai International Airport (DPS)</p>
                        <p><strong>Kedatangan:</strong> King Abdulaziz International Airport (JED)</p>
                        <p><strong>Jumlah Penumpang:</strong> 2 orang</p>
                    </div>
                    
                    <div class="info-group">
                        <h3>Informasi Pemesan</h3>
                        <div class="form-group">
                            <label for="customerName">Nama Lengkap</label>
                            <input type="text" id="customerName" name="customerName" value="Rafli">
                        </div>
                        <div class="form-group">
                            <label for="customerEmail">Email</label>
                            <input type="email" id="customerEmail" name="customerEmail" value="rafli@bwa.com">
                        </div>
                        <div class="form-group">
                            <label for="customerPhone">No. Telepon</label>
                            <input type="tel" id="customerPhone" name="customerPhone" placeholder="Tulis nomor aktif Anda">
                        </div>
                    </div>
                    
                    <div class="passenger-section">
                        <div class="passenger-header">
                            <h3 class="passenger-number">Penumpang 1</h3>
                        </div>
                        
                        <div class="form-group">
                            <label for="passenger1Name">Nama Lengkap</label>
                            <input type="text" id="passenger1Name" name="passenger1Name" value="Rafli">
                        </div>
                        
                        <div class="form-group">
                            <label for="passenger1Dob">Tanggal Lahir</label>
                            <div class="date-input-group">
                                <input type="text" id="passenger1Day" name="passenger1Day" placeholder="DD" value="08">
                                <input type="text" id="passenger1Month" name="passenger1Month" placeholder="MM" value="02">
                                <input type="text" id="passenger1Year" name="passenger1Year" placeholder="YYYY" value="2010">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="passenger1Nationality">Kewarganegaraan</label>
                            <select id="passenger1Nationality" name="passenger1Nationality">
                                <option value="Japan" selected>Japan</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Other">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="passenger-section">
                        <div class="passenger-header">
                            <h3 class="passenger-number">Penumpang 2</h3>
                        </div>
                        
                        <div class="form-group">
                            <label for="passenger2Name">Nama Lengkap</label>
                            <input type="text" id="passenger2Name" name="passenger2Name" placeholder="Tulis nama lengkap">
                        </div>
                        
                        <div class="form-group">
                            <label for="passenger2Dob">Tanggal Lahir</label>
                            <div class="date-input-group">
                                <input type="text" id="passenger2Day" name="passenger2Day" placeholder="DD">
                                <input type="text" id="passenger2Month" name="passenger2Month" placeholder="MM">
                                <input type="text" id="passenger2Year" name="passenger2Year" placeholder="YYYY">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="passenger2Nationality">Kewarganegaraan</label>
                            <select id="passenger2Nationality" name="passenger2Nationality">
                                <option value="" disabled selected>Pilih kewarganegaraan</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Japan">Japan</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Other">Lainnya</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="right-section">
                <div class="card">
                    <h2 class="card-title">Detail Transaksi</h2>
                    
                    <div class="price-summary">
                        <div class="price-item">
                            <span>2 Penumpang (Bisnis)</span>
                            <span>Rp.1.800.000</span>
                        </div>
                        <div class="price-item">
                            <span>Pajak</span>
                            <span>Rp.48.000</span>
                        </div>
                        <div class="price-item">
                            <span>Kursi (A3, A4)</span>
                            <span>Termasuk</span>
                        </div>
                        <div class="price-total">
                            <span>Total Pembayaran</span>
                            <span>Rp.1.900.000</span>
                        </div>
                    </div>
                    
                    <div class="flight-info">
                        <h3>Detail Penerbangan</h3>
                        <p><strong>Maskapai:</strong> ANA Airline</p>
                        <p><strong>Durasi:</strong> 5 Jam</p>
                        <p><strong>Transit:</strong> 1x</p>
                        <p><strong>Keberangkatan:</strong> 16 November 2024</p>
                    </div>
                    
                    <form method="POST" action="{{ route('booking.payment', ['flight' => $flight->id]) }}">
                        @csrf
                        <button type="submit" class="btn-continue">Lanjut ke Pembayaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>