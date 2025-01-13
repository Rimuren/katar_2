@extends('layouts.apperance')

@section('title', 'Add New Shop')

@section('content')
    <div class="container">
        <h1 class="my-4">Add New Shop</h1>
        
        <form action="{{ route('shop.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="namaBarang">Shop Name</label>
                <input type="text" class="form-control" id="namaBarang" name="namaBarang" value="{{ old('namaBarang') }}">
                @error('namaBarang') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="idbarang">Barang</label>
                <select class="form-control" id="idbarang" name="idbarang">
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->idbarang }}" {{ old('idbarang') == $barang->idbarang ? 'selected' : '' }}>
                            {{ $barang->namaBarang }}
                        </option>
                    @endforeach
                </select>
                @error('idbarang') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="image">Shop Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-success mt-3">Save Shop</button>
        </form>
    </div>
@endsection
