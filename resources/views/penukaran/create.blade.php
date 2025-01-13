@extends('layouts.apperance')

@section('title', 'Tambah Penukaran')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Penukaran</h1>
        <form action="{{ route('penukaran.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="pelanggan_id" class="form-label">Pelanggan</label>
                <select class="form-control" id="pelanggan_id" name="pelanggan_id" required>
                    <option value="">Pilih Pelanggan</option>
                    @foreach($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="shop_id" class="form-label">Shop</label>
                <select class="form-control" id="shop_id" name="shop_id" required>
                    <option value="">Pilih Shop</option>
                    @foreach($shops as $shop)
                        <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="pointUsed" class="form-label">Poin yang Digunakan</label>
                <input type="number" class="form-control" id="pointUsed" name="pointUsed" required>
            </div>
            <div class="mb-3">
                <label for="tglReedem" class="form-label">Tanggal Penukaran</label>
                <input type="date" class="form-control" id="tglReedem" name="tglReedem" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
