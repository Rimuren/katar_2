@extends('layouts.apperance')

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
