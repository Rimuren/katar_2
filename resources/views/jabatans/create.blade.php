@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Tambah Jabatan</h1>

    <form action="{{ route('jabatans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="namaJabatan" class="form-label">Nama Jabatan</label>
            <input type="text" name="namaJabatan" id="namaJabatan" class="form-control" placeholder="Masukkan nama jabatan" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('jabatans.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
