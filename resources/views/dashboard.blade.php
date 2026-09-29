@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom border-secondary">
        <h1 class="h2 text-info">Dashboard Booking Studio</h1>
    </div>
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5 class="text-muted">Total Booking</h5>
                <h3 class="text-info">{{ $totalBookings ?? 0 }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5 class="text-muted">Pending</h5>
                <h3 class="text-warning">{{ $pendingBookings ?? 0 }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5 class="text-muted">Confirmed</h5>
                <h3 class="text-success">{{ $confirmedBookings ?? 0 }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5 class="text-muted">Cancelled</h5>
                <h3 class="text-danger">{{ $cancelledBookings ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="card p-4">
        <h4 class="mb-3 text-white">Daftar Booking Terbaru</h4>

    </div>
</div>
@endsection