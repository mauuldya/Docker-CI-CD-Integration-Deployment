<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choose Seats</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;500;400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', Arial, sans-serif; background: linear-gradient(120deg, #e0eaff 0%, #fff 100%); margin: 0; padding: 0; }
        .header-bar { max-width: 1200px; margin: 0 auto; padding-top: 32px; }
        .back-btn { display: inline-flex; align-items: center; background: #fff; color: #2d2350; font-weight: 700; border-radius: 999px; padding: 10px 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); border: 1px solid #e0e0e0; text-decoration: none; margin-bottom: 24px; }
        .back-btn svg { margin-right: 8px; }
        .choose-seats-title { font-size: 2.8rem; font-weight: 900; margin-bottom: 32px; letter-spacing: -2px; color: #2d2350; text-align: left; }
        .main-container { max-width: 1200px; margin: 0 auto; display: flex; gap: 40px; align-items: flex-start; }
        .flight-card { background: #fff; border-radius: 24px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); padding: 36px 36px 28px 36px; min-width: 390px; max-width: 440px; }
        .flight-card h2 { font-size: 1.4rem; margin-bottom: 22px; font-weight: 800; letter-spacing: 1px; }
        .flight-info-row { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px; }
        .flight-info-label { color: #888; font-size: 1.05rem; font-weight: 500; min-width: 90px; }
        .flight-info-value { font-weight: 700; color: #2d2350; text-align: right; max-width: 220px; }
        .flight-card .airline-logo { height: 36px; margin-bottom: 10px; }
        .flight-card .price { color: #1e9c5a; font-weight: 700; font-size: 1.2rem; }
        .flight-card .flight-detail { background: #f7f7fa; border-radius: 16px; padding: 18px 16px; margin: 22px 0; }
        .flight-card .flight-detail .airline-logo { height: 32px; }
        .flight-card .flight-detail .detail-row { display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; }
        .flight-card .flight-detail .detail-label { color: #888; font-size: 0.98rem; }
        .flight-card .flight-detail .detail-value { font-weight: 700; }
        .flight-card .class-card { background: #fff; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 14px 18px; margin-top: 16px; display: flex; align-items: center; }
        .flight-card .class-card img { border-radius: 10px; width: 52px; height: 52px; object-fit: cover; margin-right: 16px; }
        .flight-card .class-card .class-info { flex: 1; }
        .flight-card .class-card .class-title { font-weight: 700; font-size: 1.1rem; }
        .flight-card .class-card .class-price { color: #1e9c5a; font-weight: 700; font-size: 1.08rem; }
        .plane-bg { background: url('https://i.ibb.co/6b7Qw8k/plane-bg.png') no-repeat center top/contain; border-radius: 32px; min-height: 600px; padding: 40px 32px 32px 32px; flex: 1; position: relative; }
        .seat-section { background: rgba(255,255,255,0.97); border-radius: 32px; padding: 36px 28px 28px 28px; box-shadow: 0 4px 24px rgba(0,0,0,0.04); margin-top: 60px; }
        .seat-section h3 { text-align: center; font-size: 1.35rem; font-weight: 800; margin-bottom: 22px; letter-spacing: 1px; }
        .legend { text-align: center; margin-bottom: 22px; font-size: 1.05rem; }
        .legend span { display: inline-block; width: 18px; height: 18px; border-radius: 4px; margin-right: 6px; vertical-align: middle; }
        .legend .available { border: 2px solid orange; background: #fff; }
        .legend .booked { border: 2px solid #ccc; background: #eee; }
        .legend .selected { border: 2px solid #007bff; background: #e0f0ff; }
        .seat-map {
            display: grid;
            grid-template-columns: repeat(3, 48px) 48px repeat(3, 48px);
            column-gap: 0;
            row-gap: 22px;
            justify-content: center;
            margin-bottom: 24px;
        }
        .seat {
            border: 2px solid orange;
            border-radius: 12px;
            padding: 10px 0;
            background: #fff;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            font-size: 1.13rem;
            transition: 0.2s;
            position: relative;
            box-sizing: border-box;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            outline: none;
        }
        .seat:focus { outline: none; }
        .seat.empty { background: transparent; border: none; box-shadow: none; cursor: default; }
        .seat.seat-gap { margin-left: 36px; }
        .seat.booked { background: #eee; color: #aaa; border: 2px solid #ccc; cursor: not-allowed; }
        .seat.selected {
            border: 2.5px solid #007bff !important;
            background: #e0f0ff !important;
        }
        @media (max-width: 900px) {
            .main-container { flex-direction: column; align-items: stretch; }
            .plane-bg { min-height: 400px; }
        }
        .transaction-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 28px 28px 18px 28px;
            margin-bottom: 32px;
            min-width: 340px;
            max-width: 400px;
        }
        .transaction-title {
            font-size: 1.2rem;
            font-weight: 800;
            margin-bottom: 18px;
        }
        .transaction-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 1.05rem;
        }
        .transaction-label { color: #888; }
        .transaction-value { font-weight: 700; }
        .transaction-grand { color: #1976f9; font-weight: 900; font-size: 1.25rem; }
        .continue-btn {
            width: 100%;
            margin-top: 24px;
            background: #1976f9;
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 16px 0;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s;
        }
        .continue-btn:disabled {
            background: #b3c6f7;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
<div class="header-bar">
    <a href="{{ url()->previous() }}" class="back-btn">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
        Back to Choose Flight
    </a>
    <div class="choose-seats-title">Choose Seats</div>
</div>
<div class="main-container">
    <!-- Left: Transaction Details -->
    <div>
        <div class="transaction-card" id="transaction-details">
            <div class="transaction-title">Transaction Details</div>
            <div class="transaction-row">
                <span class="transaction-label">Quantity</span>
                <span class="transaction-value" id="quantity-value">1 People</span>
            </div>
            <div class="transaction-row">
                <span class="transaction-label">Tiers</span>
                <span class="transaction-value">{{ ucfirst($class->class_type ?? '-') }}</span>
            </div>
            <div class="transaction-row">
                <span class="transaction-label">Seats</span>
                <span class="transaction-value" id="seats-value">-</span>
            </div>
            <div class="transaction-row">
                <span class="transaction-label">Price</span>
                <span class="transaction-value" id="price-value">Rp {{ number_format($class->price ?? 0, 0, ',', '.') }}</span>
            </div>
            <div class="transaction-row">
                <span class="transaction-label">Govt. Tax</span>
                <span class="transaction-value">11%</span>
            </div>
            <div class="transaction-row">
                <span class="transaction-label">Sub Total</span>
                <span class="transaction-value" id="subtotal-value">Rp 0</span>
            </div>
            <div class="transaction-row">
                <span class="transaction-label">Total Tax</span>
                <span class="transaction-value" id="totaltax-value">Rp 0</span>
            </div>
            <div class="transaction-row">
                <span class="transaction-label">Grand Total</span>
                <span class="transaction-grand" id="grandtotal-value">Rp 0</span>
            </div>
        </div>
    </div>
    <!-- Right: Seat Map -->
    <div class="plane-bg">
        <div class="seat-section">
            <h3>{{ ucfirst($class->class_type ?? 'Economy') }} Class</h3>
            <div class="legend">
                <span class="available"></span> Available
                <span class="booked"></span> Booked
                <span class="selected"></span> Selected
            </div>
            <form id="seat-booking-form" method="POST" action="{{ route('bookings.store') }}">
                @csrf
                <input type="hidden" name="seats" id="selected-seats-input">
                <input type="hidden" name="class_id" value="{{ $class->id ?? '' }}">
                <input type="hidden" name="total_price" id="total-price-input">
                <input type="hidden" name="flight_id" value="{{ $flight->id }}">
                <div class="seat-map">
                    @php
                        $rows = ['A','B','C','D','E'];
                        $seatMap = collect($seats)->keyBy('name');
                    @endphp
                    @foreach($rows as $row)
                        @for($col = 1; $col <= 7; $col++)
                            @if($col == 4)
                                <button class="seat empty" tabindex="-1" disabled></button>
                            @else
                                @php
                                    $realCol = $col < 4 ? $col : $col - 1;
                                    $seatName = $row . $realCol;
                                    $seat = $seatMap->get($seatName);
                                    $isAvailable = $seat ? $seat->is_available : true;
                                    $isBooked = $seat && !$seat->is_available;
                                @endphp
                                <button type="button" class="seat {{ $isBooked ? 'booked' : '' }}" {{ $isBooked ? 'disabled' : '' }}>{{ $seatName }}</button>
                            @endif
                        @endfor
                    @endforeach
                </div>
                <button class="continue-btn" id="continue-btn" type="submit" disabled>Continue Booking</button>
            </form>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Ambil semua button seat yang tidak empty dan tidak booked
    const seatButtons = document.querySelectorAll('.seat:not(.empty):not(.booked)');
    const continueBtn = document.getElementById('continue-btn');
    const selectedSeatsInput = document.getElementById('selected-seats-input');
    const totalPriceInput = document.getElementById('total-price-input');
    let selectedSeats = [];

    seatButtons.forEach(function(seat) {
        seat.addEventListener('click', function() {
            this.classList.toggle('selected');
            updateTransaction();
        });
    });

    function updateTransaction() {
        const seatsValue = document.getElementById('seats-value');
        const quantityValue = document.getElementById('quantity-value');
        const subtotalValue = document.getElementById('subtotal-value');
        const totaltaxValue = document.getElementById('totaltax-value');
        const grandtotalValue = document.getElementById('grandtotal-value');
        const price = {{ $class->price ?? 0 }};
        const tax = 0.11;
        const selected = document.querySelectorAll('.seat.selected');
        selectedSeats = Array.from(selected).map(s => s.textContent);

        seatsValue.textContent = selectedSeats.length ? selectedSeats.join(', ') : '-';
        quantityValue.textContent = selectedSeats.length + ' People';
        const subtotal = price * selectedSeats.length;
        const totaltax = subtotal * tax;
        const grandtotal = subtotal + totaltax;

        subtotalValue.textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
        totaltaxValue.textContent = 'Rp ' + totaltax.toLocaleString('id-ID');
        grandtotalValue.textContent = 'Rp ' + grandtotal.toLocaleString('id-ID');
        continueBtn.disabled = selectedSeats.length === 0;
        selectedSeatsInput.value = JSON.stringify(selectedSeats);
        totalPriceInput.value = grandtotal;
    }

    document.getElementById('seat-booking-form').addEventListener('submit', function(e) {
        if (selectedSeats.length === 0) {
            e.preventDefault();
            return false;
        }
        selectedSeatsInput.value = JSON.stringify(selectedSeats);
        totalPriceInput.value = document.getElementById('grandtotal-value').textContent.replace('Rp ', '').replace(/\./g, '');
    });

    updateTransaction();
});
</script>
</body>
</html> 