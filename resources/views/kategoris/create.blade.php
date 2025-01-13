@extends('layouts.apperance')  

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header">
                        <h3>Tambah Kategori</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategoris.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="namaKategori" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control @error('namaKategori') is-invalid @enderror" id="namaKategori" name="namaKategori" required value="{{ old('namaKategori') }}">
                                @error('namaKategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
