@extends('layouts.apperance')

@section('title', 'Tambah Poin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Poin</h1>
        <form action="{{ route('poin.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="barang_id" class="form-label">Barang</label>
                <select class="form-control" id="barang_id" name="barang_id" required>
                    <option value="">Pilih Barang</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="min_harga" class="form-label">Min Harga</label>
                <input type="number" class="form-control" id="min_harga" name="min_harga" required>
            </div>
            <div class="mb-3">
                <label for="max_harga" class="form-label">Max Harga</label>
                <input type="number" class="form-control" id="max_harga" name="max_harga" required>
            </div>
            <div class="mb-3">
                <label for="poin" class="form-label">Poin</label>
                <input type="number" class="form-control" id="poin" name="poin" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
