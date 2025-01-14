@extends('layouts.apperance')   

@section('title', 'Edit Staff')

@section('title', 'Edit Staff')

@section('content')
<<<<<<< HEAD
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
=======
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header">
                        <h3>Edit Staff</h3>
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

                        <form action="{{ route('staffs.update', $staff->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="namaStaff">Nama Staff</label>
                                <input type="text" name="namaStaff" id="namaStaff" class="form-control" value="{{ $staff->namaStaff }}" required>
                                @error('namaStaff')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="sebagai">Sebagai</label>
                                <input type="text" name="sebagai" id="sebagai" class="form-control" value="{{ $staff->sebagai }}" required>
                                @error('sebagai')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $staff->email }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="noTlp">No Telepon</label>
                                <input type="text" name="noTlp" id="noTlp" class="form-control" value="{{ $staff->noTlp }}" required>
                                @error('noTlp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary mt-3 mr-1">Simpan</button>
                                <a href="{{ route('staffs.index') }}" class="btn btn-secondary mt-3">Batal</a>
                            </div>
                        </form>
                    </div>
>>>>>>> 2b938c89418aca66050c5faa2af7eeebc53aa142
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</div>
=======
>>>>>>> 2b938c89418aca66050c5faa2af7eeebc53aa142
@endsection
