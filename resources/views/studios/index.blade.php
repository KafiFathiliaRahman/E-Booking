@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom border-secondary">
        <h1 class="h2 text-info">Kelola Studio Musik</h1>
        <a href="{{ route('studios.create') }}" class="btn btn-primary fw-bold">+ Tambah Studio Baru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card p-4 shadow-lg">
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0" style="background-color: transparent;">
                <thead>
                    <tr class="text-info border-bottom border-secondary">
                        <th>#</th>
                        <th>Nama Studio</th>
                        <th>Harga per Jam</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($studios as $studio)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-bold text-white">{{ $studio->name }}</td>
                            <td>Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }}</td>
                            <td>{{ Str::limit($studio->description, 50) }}</td>
                            <td>
                                <a href="{{ route('studios.edit', $studio->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                                <form action="{{ route('studios.destroy', $studio->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus studio ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Belum ada data studio yang tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $studios->links() }}
        </div>
    </div>
</div>
@endsection