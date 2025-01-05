@extends('layouts.apperance')

@section('title', 'Tambah Pelanggan')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
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
                                <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan">
                            </div>
                            <div class="form-group">
                                <label for="noTlp">No. Telepon</label>
                                <input type="text" class="form-control" id="noTlp" name="noTlp">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <button type="submit" class="btn btn-success mt-3">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
