@extends('layouts.apperance')

@section('title', 'Tambah Cash Drawer')

@section('content')
    <div class="container">
        <h1>Tambah Cash Drawer</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cashdrawers.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="idstaff">Staff</label>
                <select name="idstaff" id="idstaff" class="form-select" required>
                    <option value="" disabled selected>Pilih Staff</option>
                    @foreach ($staffs as $staff)
                        <option value="{{ $staff->id }}">{{ $staff->namaStaff }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="saldoAwal">Saldo Awal</label>
                <input type="number" name="saldoAwal" id="saldoAwal" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="saldoAkhir">Saldo Akhir</label>
                <input type="number" name="saldoAkhir" id="saldoAkhir" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('cashdrawers.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection