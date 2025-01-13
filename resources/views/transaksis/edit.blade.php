@extends('layouts.apperance')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>Edit Transaksi</h3>
                        <hr>
                        <form action="{{ route('transaksis.update', $transaksi->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="idPelanggan">Pelanggan</label>
                                <select name="idPelanggan" id="idPelanggan" class="form-control" required>
                                    @foreach($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->id }}" {{ $pelanggan->id == $transaksi->idPelanggan ? 'selected' : '' }}>
                                            {{ $pelanggan->namaPelanggan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="idStaff">Staff</label>
                                <select name="idStaff" id="idStaff" class="form-select" required>
                                    @foreach($staffs as $staff)
                                        <option value="{{ $staff->id }}" {{ $staff->id == $transaksi->idStaff ? 'selected' : '' }}>
                                            {{ $staff->namaStaff }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="namaTransaksi">Nama Transaksi</label>
                                <input type="text" name="namaTransaksi" id="namaTransaksi" class="form-control" value="{{ $transaksi->namaTransaksi }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="tglTransaksi">Tanggal Transaksi</label>
                                <input type="date" name="tglTransaksi" id="tglTransaksi" class="form-control" value="{{ $transaksi->tglTransaksi }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="totalTransaksi">Total Transaksi</label>
                                <input type="number" name="totalTransaksi" id="totalTransaksi" class="form-control" value="{{ $transaksi->totalTransaksi }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tipeTransaksi">Tipe Transaksi</label>
                                <select name="tipeTransaksi" id="tipeTransaksi" class="form-control" required>
                                    <option value="beli" {{ $transaksi->tipeTransaksi == 'beli' ? 'selected' : '' }}>Beli</option>
                                    <option value="tukar" {{ $transaksi->tipeTransaksi == 'tukar' ? 'selected' : '' }}>Tukar</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3 mr-1">Simpan </button>
                            <a href="{{ route('transaksis.index') }}" class="btn btn-secondary mt-3">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
