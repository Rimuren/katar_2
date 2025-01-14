@extends('layouts.app')

@section('title', 'Edit Staff')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-header">
                    <h3>Edit Staff</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('staffs.update', $staff->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nama Staff -->
                        <div class="form-group">
                            <label for="namaStaff">Nama Staff</label>
                            <input type="text" name="namaStaff" id="namaStaff" class="form-control" value="{{ old('namaStaff', $staff->namaStaff) }}" required>
                            @error('namaStaff')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Jabatan -->
                        <div class="form-group">
                            <label for="idJabatan">Jabatan</label>
                            <select name="idJabatan" id="idJabatan" class="form-control" required>
                                <option value="" disabled>Pilih Jabatan</option>
                                @foreach ($jabatans as $jabatan)
                                    <option value="{{ $jabatan->id }}" {{ $jabatan->id == $staff->idJabatan ? 'selected' : '' }}>
                                        {{ $jabatan->namaJabatan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idJabatan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $staff->email) }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="form-group">
                            <label for="noTlp">Nomor Telepon</label>
                            <input type="text" name="noTlp" id="noTlp" class="form-control" value="{{ old('noTlp', $staff->noTlp) }}" required>
                            @error('noTlp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Tombol -->
                        <div class="form-group text-right">
                            <a href="{{ route('staffs.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
