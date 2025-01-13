@extends('layouts.apperance')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>Tambah Transaksi</h3>
                        <hr>

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
                            <div class="form-group mb-3">
                                <label for="idPelanggan">Pelanggan</label>
                                <select name="idPelanggan" id="idPelanggan" class="form-control" required>
                                    <option value="" disabled selected>Pilih Pelanggan</option>
                                    @foreach($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->namaPelanggan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="idStaff">Staff</label>
                                <select name="idStaff" id="idStaff" class="form-control" required>
                                    <option value="" disabled selected>Pilih Staff</option>
                                    @foreach($staffs as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->namaStaff }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="namaTransaksi">Nama Transaksi</label>
                                <input type="text" name="namaTransaksi" id="namaTransaksi" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="tglTransaksi">Tanggal Transaksi</label>
                                <input type="date" name="tglTransaksi" id="tglTransaksi" class="form-control" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="totalTransaksi">Total Transaksi</label>
                                <input type="number" name="totalTransaksi" id="totalTransaksi" class="form-control" required min="0">
                            </div>

                            <div class="form-group mb-3">
                                <label for="tipeTransaksi">Tipe Transaksi</label>
                                <select name="tipeTransaksi" id="tipeTransaksi" class="form-control" required>
                                    <option value="" disabled selected>Pilih Transaksi</option>
                                    <option value="beli">Beli</option>
                                    <option value="tukar">Tukar</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3 mr-1">Simpan</button>
                            <a href="{{ route('transaksis.index') }}" class="btn btn-secondary mt-3">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
