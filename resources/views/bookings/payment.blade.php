@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg text-center">
                <div class="card-header border-bottom border-secondary">
                    <h3 class="mb-0 text-info">Halaman Pembayaran QRIS</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Silakan lakukan scan QR Code di bawah ini untuk menyelesaikan pembayaran sewa studio.</p>

                 
                    <div class="bg-dark p-3 rounded mb-4 text-start border border-secondary">
                        <h5 class="text-white mb-3">Informasi Pemesanan:</h5>
                        <p class="mb-1"><strong>ID Booking:</strong> #{{ $booking->id }}</p>
                        <p class="mb-1"><strong>Nama Pemesan:</strong> {{ $booking->customer_name }}</p>
                        <p class="mb-1"><strong>Studio:</strong> {{ $booking->studio->name }}</p>
                        <p class="mb-1"><strong>Jadwal:</strong> {{ $booking->booking_date }} ({{ $booking->time_slot }})</p>
                        <p class="mb-0"><strong>Total Tagihan:</strong> <span class="text-info fw-bold">Rp {{ number_format($booking->studio->price_per_hour, 0, ',', '.') }}</span></p>
                    </div>

                    <div class="mb-4 bg-white p-3 d-inline-block rounded shadow">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=BOOKING-ID-{{ $booking->id }}-{{ $booking->customer_name }}" alt="QR Code QRIS" class="img-fluid">
                        <p class="text-dark mt-2 mb-0 fw-bold small">SCAN QRIS</p>
                    </div>

                    <div class="alert alert-warning py-2 text-dark fw-semibold" role="alert">
                        Status Pembayaran: <strong>{{ $booking->status }}</strong>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                        <a href="{{ route('dashboard') }}" class="btn btn-success fw-bold">Selesai / Cek Status</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection