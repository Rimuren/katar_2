@extends('layouts.apperance')

@section('title', 'Tambah Penjualan')

@section('content')
<div class="container">
    <h1>Tambah Penjualan</h1>

    <form action="{{ route('penjualans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="idtransaksi">ID Transaksi</label>
            <input type="number" name="idtransaksi" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="idbarang">ID Barang</label>
            <input type="number" name="idbarang" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="totalHarga">Total Harga</label>
            <input type="number" name="totalHarga" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
