<<<<<<< HEAD
@extends('layouts.app') 

@section('title', 'Tambah Staff')  

@section('content')  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header">
                        <h3>Tambah Staff</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('staffs.store') }}" method="POST">
                            @csrf
                            
                            <!-- Nama Staff -->
                            <div class="form-group">
                                <label for="namaStaff">Nama Staff</label>
                                <input type="text" name="namaStaff" id="namaStaff" class="form-control" placeholder="Masukkan nama staff" required>
=======
@extends('layouts.apperance')

@section('title', 'Tambah Staff')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header">
                        <h3>Tambah Staff</h3>
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

                        <form action="{{ route('staffs.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="namaStaff">Nama Staff</label>
                                <input type="text" name="namaStaff" id="namaStaff" class="form-control" value="{{ old('namaStaff') }}" required>
>>>>>>> 2b938c89418aca66050c5faa2af7eeebc53aa142
                                @error('namaStaff')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

<<<<<<< HEAD
                            <!-- Jabatan -->
                            <div class="form-group">
                                <label for="idJabatan">Jabatan</label>
                                <select name="idJabatan" id="idJabatan" class="form-control" required>
                                    <option value="" disabled selected>Pilih Jabatan</option>
                                    @foreach ($jabatans as $jabatan)
                                        <option value="{{ $jabatan->id }}">{{ $jabatan->namaJabatan }}</option>
                                    @endforeach
                                </select>
                                @error('idJabatan')
=======
                            <div class="form-group">
                                <label for="sebagai">Sebagai</label>
                                <input type="text" name="sebagai" id="sebagai" class="form-control" value="{{ old('sebagai') }}" required>
                                @error('sebagai')
>>>>>>> 2b938c89418aca66050c5faa2af7eeebc53aa142
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

<<<<<<< HEAD
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email staff" required>
=======
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
>>>>>>> 2b938c89418aca66050c5faa2af7eeebc53aa142
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

<<<<<<< HEAD
                            <!-- Nomor Telepon -->
                            <div class="form-group">
                                <label for="noTlp">Nomor Telepon</label>
                                <input type="text" name="noTlp" id="noTlp" class="form-control" placeholder="Masukkan nomor telepon staff" required>
=======
                            <div class="form-group">
                                <label for="noTlp">No Telepon</label>
                                <input type="text" name="noTlp" id="noTlp" class="form-control" value="{{ old('noTlp') }}" required>
>>>>>>> 2b938c89418aca66050c5faa2af7eeebc53aa142
                                @error('noTlp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

<<<<<<< HEAD
                            <!-- Tombol -->
                            <div class="form-group text-right">
                                <a href="{{ route('staffs.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
=======
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary mt-3 mr-1">Simpan</button>
                                <a href="{{ route('staffs.index') }}" class="btn btn-secondary mt-3">Batal</a>
>>>>>>> 2b938c89418aca66050c5faa2af7eeebc53aa142
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
@endsection  
=======
@endsection
>>>>>>> 2b938c89418aca66050c5faa2af7eeebc53aa142
