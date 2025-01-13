@extends('layouts.apperance')

@section('title', 'Add New Shop')

@section('content')
    <div class="container">
        <h1 class="my-4">Add New Shop</h1>
        
        <form action="{{ route('shops.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="jumlahPoin">Jumlah Poin</label>
                <input type="text" class="form-control" id="jumlahPoin" name="jumlahPoin" value="{{ old('jumlahPoin') }}">
                @error('jumlahPoin') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="idbarang">Barang</label>
                <select class="form-control" id="idbarang" name="idbarang">
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}" {{ old('idbarang') == $barang->idbarang ? 'selected' : '' }}>
                            {{ $barang->namaBarang }} (Poin: {{ $barang->jumlahPoin }})
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
