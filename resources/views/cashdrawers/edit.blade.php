@extends('layouts.apperance')

@section('title', 'Edit Cash Drawer')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3 class="text-center my-4">Edit Cash Drawer</h3>
                        <hr>
                        <form action="{{ route('cashdrawers.update', $cashdrawer->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="idstaff">Staff</label>
                                <select name="idstaff" id="idstaff" class="form-select" required>
                                    @foreach ($staffs as $staff)
                                        <option value="{{ $staff->id }}" {{ $cashdrawer->idstaff == $staff->id ? 'selected' : '' }}>
                                            {{ $staff->namaStaff }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- <div class="form-group mb-3">
                                <label for="jamBuka">Jam Buka</label>
                                <input type="time" name="jamBuka" id="jamBuka" class="form-control" value="{{ $cashdrawer->jamBuka }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="jamTutup">Jam Tutup</label>
                                <input type="time" name="jamTutup" id="jamTutup" class="form-control" value="{{ $cashdrawer->jamTutup }}" required>
                            </div> -->

                            <div class="form-group mb-3">
                                <label for="saldoAwal">Saldo Awal</label>
                                <input type="number" name="saldoAwal" id="saldoAwal" class="form-control" value="{{ $cashdrawer->saldoAwal }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="saldoAkhir">Saldo Akhir</label>
                                <input type="number" name="saldoAkhir" id="saldoAkhir" class="form-control" value="{{ $cashdrawer->saldoAkhir }}">
                            </div>

                            <button type="submit" class="btn btn-success btn-block">Update</button>
                            <a href="{{ route('cashdrawers.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
