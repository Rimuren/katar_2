@extends('layouts.apperance')  

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Edit Merk</h3>
                        <form action="{{ route('merks.update', $merk->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label for="namaMerk">Nama Merk</label>
                                <input type="text" class="form-control @error('namaMerk') is-invalid @enderror" 
                                       id="namaMerk" name="namaMerk" value="{{ old('namaMerk', $merk->namaMerk) }}" required>
                                @error('namaMerk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                                <a href="{{ route('merks.index') }}" class="btn btn-secondary btn-block">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
