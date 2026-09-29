<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran QR Code - NeonStudio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0b132b; color: #fff; font-family: 'Segoe UI', sans-serif; }
        .payment-card { background: #ffffff; color: #333; border-radius: 15px; padding: 30px; box-shadow: 0 0 20px rgba(0, 240, 255, 0.2); }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-5">
        <div class="payment-card text-center">
            <h4 class="fw-bold mb-3">Scan QR Code untuk Pembayaran</h4>
            <p class="text-muted">Selesaikan pembayaran sewa studio untuk pemesan: <strong>{{ $booking->customer_name }}</strong></p>
            
            <div class="my-4">
                <!-- Simulasi QR Code menggunakan API publik -->
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=PAYMENT-STUDIO-{{ $booking->id }}" alt="QRIS Code" class="img-fluid border p-2 rounded">
            </div>

            <h5 class="text-primary fw-bold mb-4">Total: Rp {{ number_format($booking->studio->price_per_hour ?? 100000, 0, ',', '.') }}</h5>

            <form action="{{ route('bookings.processPay', $booking->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success w-100 py-2 fw-bold">Konfirmasi Pembayaran Selesai</button>
            </form>
            <a href="{{ route('dashboard') }}" class="btn btn-link text-muted mt-3">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>