@extends('layouts.apperance')  

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Tambah Kategori</h3>
                        <form action="{{ route('kategoris.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="namaKategori">Nama Kategori</label>
                                <input type="text" class="form-control @error('namaKategori') is-invalid @enderror" id="namaKategori" name="namaKategori" required value="{{ old('namaKategori') }}">
                                @error('namaKategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            <a href="{{ route('kategoris.index') }}" class="btn btn-secondary btn-block">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
