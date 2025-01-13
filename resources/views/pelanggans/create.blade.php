@extends('layouts.apperance')

@section('title', 'Tambah Pelanggan')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <h3 class="text-center my-4">Tambah Pelanggan</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('pelanggans.store') }}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="namaPelanggan">Nama Pelanggan</label>
                                <input type="text" class="form-control @error('namaPelanggan') is-invalid @enderror" 
                                       id="namaPelanggan" name="namaPelanggan" value="{{ old('namaPelanggan') }}">
                                @error('namaPelanggan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="noTlp">No. Telepon</label>
                                <input type="text" class="form-control @error('noTlp') is-invalid @enderror" 
                                       id="noTlp" name="noTlp" value="{{ old('noTlp') }}">
                                @error('noTlp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                                <button type="submit" class="btn btn-success mt-3 mr-1">Simpan</button>
                                <a href="{{ route('pelanggans.index') }}" class="btn btn-secondary mt-3">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
