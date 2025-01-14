@extends('layouts.apperance')

@section('title', 'Edit Shift')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header">
                        <h3>Edit Shift</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('shifts.update', $shift->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="idstaff">Nama Staff</label>
                                <select name="idstaff" id="idstaff" class="form-control" required>
                                    <option value="" disabled selected>Pilih Staff</option>
                                    @foreach ($staffs as $staff)
                                        <option value="{{ $staff->id }}" {{ $shift->idstaff == $staff->id ? 'selected' : '' }}>
                                            {{ $staff->namaStaff }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idstaff')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jamKerja">Jam Kerja</label>
                                <input type="time" name="jamKerja" id="jamKerja" class="form-control" value="{{ \Carbon\Carbon::parse($shift->jamKerja)->format('H:i') }}" required>
                                @error('jamKerja')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jamPulang">Jam Pulang</label>
                                <input type="time" name="jamPulang" id="jamPulang" class="form-control" value="{{ \Carbon\Carbon::parse($shift->jamPulang)->format('H:i') }}" required>
                                @error('jamPulang')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary mt-3 mr-1">Simpan</button>
                                <a href="{{ route('shifts.index') }}" class="btn btn-secondary mt-3">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
