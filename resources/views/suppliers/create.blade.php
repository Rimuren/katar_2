@extends('layouts.apperance')

@section('title', 'Tambah Supplier')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-header">
                    <h3>Tambah Supplier</h3>
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

                    <form action="{{ route('suppliers.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="namaSupplier" class="form-label">Nama Supplier</label>
                            <input type="text" name="namaSupplier" id="namaSupplier" class="form-control @error('namaSupplier') is-invalid @enderror" value="{{ old('namaSupplier') }}" required>
                            @error('namaSupplier')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="noTlp" class="form-label">No Telepon</label>
                            <input type="text" name="noTlp" id="noTlp" class="form-control @error('noTlp') is-invalid @enderror" value="{{ old('noTlp') }}" required>
                            @error('noTlp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
