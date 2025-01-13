@extends('layouts.apperance')

@section('title', 'Edit Pelanggan')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                    <h3>Edit Pelanggan</h3>
                    <hr>
                        <form action="{{ route('pelanggans.update', $pelanggan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="namaPelanggan">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" value="{{$pelanggan->namaPelanggan }}" required>
                            </div>
                            <div class="form-group">
                                <label for="noTlp">No. Telepon</label>
                                <input type="text" class="form-control" id="noTlp" name="noTlp" value="{{$pelanggan->noTlp}}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$pelanggan->email }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mr-1">Simpan
                            </button>
                            <a href="{{ route('pelanggans.index') }}" class="btn btn-secondary mt-3">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
