@extends('layouts.app')>

@section('content')
<div class="container py-4">
    <div class="card bg-dark text-white border-primary shadow-lg" style="background-color: #0d1b2a !important;">
        <div class="card-header border-bottom border-primary">
            <h3 class="mb-0 text-info">Form Booking Studio Musik</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="customer_name" class="form-label">Nama Pemesan</label>
                    <input type="text" class="form-control bg-dark text-white border-secondary" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="studio_id" class="form-label">Pilih Studio</label>
                    <select class="form-select bg-dark text-white border-secondary" id="studio_id" name="studio_id" required>
                        <option value="">-- Pilih Studio --</option>
                        @foreach($studios as $studio)
                            <option value="{{ $studio->id }}">{{ $studio->name }} (Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }}/jam)</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="booking_date" class="form-label">Tanggal Booking</label>
                    <input type="date" class="form-control bg-dark text-white border-secondary" id="booking_date" name="booking_date" value="{{ old('booking_date') }}" required>
                </div>

                <div class="mb-3">
                    <label for="time_slot" class="form-label">Jam / Slot Waktu</label>
                    <input type="text" class="form-control bg-dark text-white border-secondary" id="time_slot" name="time_slot" placeholder="Contoh: 13:00 - 15:00" value="{{ old('time_slot') }}" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold">Simpan Booking & Lanjut Pembayaran</button>
            </form>
        </div>
    </div>
</div>
@endsection