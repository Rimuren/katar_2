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
                                @error('namaStaff')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

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
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email staff" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="form-group">
                                <label for="noTlp">Nomor Telepon</label>
                                <input type="text" name="noTlp" id="noTlp" class="form-control" placeholder="Masukkan nomor telepon staff" required>
                                @error('noTlp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Tombol -->
                            <div class="form-group text-right">
                                <a href="{{ route('staffs.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  
