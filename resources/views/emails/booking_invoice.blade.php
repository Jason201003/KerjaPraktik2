<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pemesanan</title>
</head>
<body>
    <h2>Halo {{ $details['first_name'] }},</h2>
    <p>Terima kasih telah memesan kamar di {{ config('app.name') }}!</p>
    <p>Berikut detail pesanan Anda:</p>
    <ul>
        <li>Kode Pesanan: <strong>{{ $details['order_code'] }}</strong></li>
        <li>Nama: {{ $details['first_name'] }} {{ $details['last_name'] }}</li>
        <li>Check-In: {{ $details['check_in'] }}</li>
        <li>Check-Out: {{ $details['check_out'] }}</li>
        <li>Total Harga: IDR {{ number_format($details['total_price'], 0, ',', '.') }}</li>
    </ul>
    <p>Semoga Anda menikmati masa menginap Anda!</p>
    <p>Salam, {{ config('app.name') }}</p>
</body>
</html>
