@extends('layouts.apperance')

@section('content')
<div class="container">
    <h1>Edit Transaksi</h1>
    <form action="{{ route('transaksis.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="idPelanggan">Pelanggan</label>
            <select name="idPelanggan" id="idPelanggan" class="form-control">
                @foreach($pelanggans as $pelanggan)
                <option value="{{ $pelanggan->id }}" {{ $pelanggan->id == $transaksi->idPelanggan ? 'selected' : '' }}>{{ $pelanggan->namaPelanggan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="idStaff">Staff</label>
            <select name="idStaff" id="idStaff" class="form-control">
                @foreach($staffs as $staff)
                <option value="{{ $staff->id }}" {{ $staff->id == $transaksi->idStaff ? 'selected' : '' }}>{{ $staff->namaStaff }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="namaTransaksi">Nama Transaksi</label>
            <input type="text" name="namaTransaksi" id="namaTransaksi" class="form-control" value="{{ $transaksi->namaTransaksi }}" required>
        </div>
        <div class="form-group">
            <label for="tglTransaksi">Tanggal Transaksi</label>
            <input type="date" name="tglTransaksi" id="tglTransaksi" class="form-control" value="{{ $transaksi->tglTransaksi }}" required>
        </div>
        <div class="form-group">
            <label for="totalTransaksi">Total Transaksi</label>
            <input type="number" name="totalTransaksi" id="totalTransaksi" class="form-control" value="{{ $transaksi->totalTransaksi }}" required>
        </div>
        <div class="form-group">
            <label for="tipeTransaksi">Tipe Transaksi</label>
            <select name="tipeTransaksi" id="tipeTransaksi" class="form-control">
                <option value="beli" {{ $transaksi->tipeTransaksi == 'beli' ? 'selected' : '' }}>Beli</option>
                <option value="tukar" {{ $transaksi->tipeTransaksi == 'tukar' ? 'selected' : '' }}>Tukar</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </form>
</div>
@endsection
