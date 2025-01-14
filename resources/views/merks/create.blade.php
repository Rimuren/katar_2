@extends('layouts.apperance')    

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header">
                        <h3>Tambah Merk</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('merks.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="namaMerk">Nama Merk</label>
                                <input type="text" class="form-control @error('namaMerk') is-invalid @enderror" id="namaMerk" name="namaMerk" required value="{{ old('namaMerk') }}">
                                @error('namaMerk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary mt-3 mr-1">Simpan</button>
                                <a href="{{ route('merks.index') }}" class="btn btn-secondary mt-3">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
