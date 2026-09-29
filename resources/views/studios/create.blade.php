@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header border-bottom border-secondary">
                    <h3 class="mb-0 text-info">Tambah Studio Musik Baru</h3>
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

                    <form action="{{ route('studios.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Studio</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Studio A (Band Room)" required>
                        </div>

                        <div class="mb-3">
                            <label for="price_per_hour" class="form-label">Harga per Jam (Rp)</label>
                            <input type="number" class="form-control" id="price_per_hour" name="price_per_hour" value="{{ old('price_per_hour') }}" placeholder="Contoh: 75000" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi / Fasilitas</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Contoh: Dilengkapi drum set Pearl, amplifier Marshall, AC, dll." required>{{ old('description') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('studios.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary fw-bold">Simpan Studio</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection