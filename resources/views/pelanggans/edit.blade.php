@extends('layouts.apperance')

@section('title', 'Edit Pelanggan')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="text-center mb-4">Edit Pelanggan</h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('pelanggans.update', $pelanggan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="namaPelanggan">Nama Pelanggan</label>
                                <input type="text" class="form-control @error('namaPelanggan') is-invalid @enderror" 
                                       id="namaPelanggan" name="namaPelanggan" 
                                       value="{{ old('namaPelanggan', $pelanggan->namaPelanggan) }}" required>
                                @error('namaPelanggan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="noTlp">No. Telepon</label>
                                <input type="text" class="form-control @error('noTlp') is-invalid @enderror" 
                                       id="noTlp" name="noTlp" 
                                       value="{{ old('noTlp', $pelanggan->noTlp) }}" required>
                                @error('noTlp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" 
                                       value="{{ old('email', $pelanggan->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                                <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
                                <a href="{{ route('pelanggans.index') }}" class="btn btn-secondary mt-3">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
