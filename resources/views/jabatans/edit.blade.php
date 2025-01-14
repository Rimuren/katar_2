@extends('layouts.apperance')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Edit Jabatan</h1>

    <form action="{{ route('jabatans.update', $jabatan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="namaJabatan" class="form-label">Nama Jabatan</label>
            <input type="text" name="namaJabatan" id="namaJabatan" class="form-control" value="{{ $jabatan->namaJabatan }}" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('jabatans.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-warning">Perbarui</button>
        </div>
    </form>
</div>
@endsection
