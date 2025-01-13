@extends('layouts.apperance')  

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('kategoris.update', $kategori->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="namaKategori">Nama Kategori</label>
                                <input type="text" class="form-control @error('namaKategori') is-invalid @enderror" id="namaKategori" name="namaKategori" value="{{ old('namaKategori', $kategori->namaKategori) }}" required>
                                @error('namaKategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                            <a href="{{ route('kategoris.index') }}" class="btn btn-secondary btn-block">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
