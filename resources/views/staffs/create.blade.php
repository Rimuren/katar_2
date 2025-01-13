@extends('layouts.apperance')

@section('title', 'Tambah Staff')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header">
                        <h3>Tambah Staff</h3>
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

                        <form action="{{ route('staffs.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="namaStaff">Nama Staff</label>
                                <input type="text" name="namaStaff" id="namaStaff" class="form-control" value="{{ old('namaStaff') }}" required>
                                @error('namaStaff')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="sebagai">Sebagai</label>
                                <input type="text" name="sebagai" id="sebagai" class="form-control" value="{{ old('sebagai') }}" required>
                                @error('sebagai')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="noTlp">No Telepon</label>
                                <input type="text" name="noTlp" id="noTlp" class="form-control" value="{{ old('noTlp') }}" required>
                                @error('noTlp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary mt-3 mr-1">Simpan</button>
                                <a href="{{ route('staffs.index') }}" class="btn btn-secondary mt-3">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
