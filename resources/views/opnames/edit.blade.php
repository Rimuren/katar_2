@extends('layouts.apperance')

@section('title', 'Edit Opname')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3 >Edit Opname</h3>
                        <hr>
                        <form action="{{ route('opnames.update', $opname->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="idbarang">Barang</label>
                                <select name="idbarang" class="form-control" required>
                                    <option value="" disabled selected>Pilih Barang</option>
                                    @foreach ($barangs as $barang)
                                        <option value="{{ $barang->id }}" {{ $barang->id == $opname->idbarang ? 'selected' : '' }}>{{ $barang->namaBarang }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="idstaff">Staff</label>
                                <select name="idstaff" class="form-control" required>
                                    <option value="" disabled selected>Pilih Staff</option>
                                    @foreach ($staffs as $staff)
                                        <option value="{{ $staff->id }}" {{ $staff->id == $opname->idstaff ? 'selected' : '' }}>{{ $staff->namaStaff }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tglOpname">Tanggal Opname</label>
                                <input type="date" name="tglOpname" class="form-control" value="{{ $opname->tglOpname }}" required>
                            </div>

                            <div class="form-group">
                                <label for="stokFisik">Stok Fisik</label>
                                <input type="number" name="stokFisik" class="form-control" value="{{ $opname->stokFisik }}" required min="0">
                            </div>
                                <button type="submit" class="btn btn-primary mt-3 mr-1">Simpan</button>
                                <a href="{{ route('opnames.index') }}" class="btn btn-secondary mt-3">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
