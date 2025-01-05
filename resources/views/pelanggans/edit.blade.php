@extends('layouts.apperance')

@section('title', 'Edit Pelanggan')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="text-center mb-4">Edit Pelanggan</h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('pelanggans.update', $pelanggan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="namaPelanggan">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" value="{{ old('namaPelanggan', $pelanggan->namaPelanggan) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="noTlp">No. Telepon</label>
                                <input type="text" class="form-control" id="noTlp" name="noTlp" value="{{ old('noTlp', $pelanggan->noTlp) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $pelanggan->email) }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-save"></i> Perbarui
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
