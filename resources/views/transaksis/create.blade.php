@extends('layouts.apperance')

@section('content')
<div class="container">
    <h1>Tambah Transaksi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksis.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="idPelanggan">Pelanggan</label>
            <select name="idPelanggan" id="idPelanggan" class="form-control" required>
                <option value="">Pilih Pelanggan</option>
                @foreach($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->namaPelanggan }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="idStaff">Staff</label>
            <select name="idStaff" id="idStaff" class="form-control" required>
                <option value="">Pilih Staff</option>
                @foreach($staffs as $staff)
                    <option value="{{ $staff->id }}">{{ $staff->namaStaff }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="namaTransaksi">Nama Transaksi</label>
            <input type="text" name="namaTransaksi" id="namaTransaksi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tglTransaksi">Tanggal Transaksi</label>
            <input type="date" name="tglTransaksi" id="tglTransaksi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="totalTransaksi">Total Transaksi</label>
            <input type="number" name="totalTransaksi" id="totalTransaksi" class="form-control" required min="0">
        </div>
        <div class="form-group">
            <label for="tipeTransaksi">Tipe Transaksi</label>
            <select name="tipeTransaksi" id="tipeTransaksi" class="form-control" required>
                <option value="beli">Beli</option>
                <option value="tukar">Tukar</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('transaksis.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
