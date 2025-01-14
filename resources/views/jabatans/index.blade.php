@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Daftar Jabatan</h1>

    <!-- Button untuk menambah jabatan baru -->
    <div class="mb-4">
        <a href="{{ route('jabatans.create') }}" class="btn btn-primary">Tambah Jabatan Baru</a>
    </div>

    <!-- Tabel Daftar Jabatan -->
    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jabatans as $jabatan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jabatan->namaJabatan }}</td>
                <td>
                    <!-- Button Edit dan Delete -->
                    <a href="{{ route('jabatans.edit', $jabatan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('jabatans.destroy', $jabatan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jabatan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('styles')
<!-- Menggunakan Bootstrap 5 untuk styling -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('scripts')
<!-- Script tambahan jika diperlukan -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
