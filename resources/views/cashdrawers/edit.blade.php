@extends('layouts.apperance')

@section('title', 'Edit Cash Drawer')

@section('content')
    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <h3>Edit Cash Drawer</h3>
                <hr>
                <form action="{{ route('cashdrawers.update', $cashdrawer->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="idstaff" >Staff</label>
                        <select name="idstaff" id="idstaff" class="form-select" required>
                            @foreach ($staffs as $staff)
                                <option value="{{ $staff->id }}" {{$cashdrawer->idstaff == $staff->id ? 'selected' : '' }}>
                                    {{ $staff->namaStaff }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="saldoAwal" class="form-label">Saldo Awal</label>
                        <input type="number" name="saldoAwal" id="saldoAwal" class="form-control" value="{{ old('saldoAwal', $cashdrawer->saldoAwal) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="saldoAkhir" class="form-label">Saldo Akhir</label>
                        <input type="number" name="saldoAkhir" id="saldoAkhir" class="form-control" value="{{ old('saldoAkhir', $cashdrawer->saldoAkhir) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('cashdrawers.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
