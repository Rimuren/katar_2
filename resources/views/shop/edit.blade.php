@extends('layouts.apperance')

@section('title', 'Edit Shop')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Shop</h1>
        
        <form action="{{ route('shop.update', $shop->idshop) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Shop Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $shop->name) }}">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="idbarang">Barang</label>
                <select class="form-control" id="idbarang" name="idbarang">
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->idbarang }}" {{ old('idbarang', $shop->idbarang) == $barang->idbarang ? 'selected' : '' }}>
                            {{ $barang->namaBarang }}
                        </option>
                    @endforeach
                </select>
                @error('idbarang') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="image">Shop Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @if($shop->image)
                    <img src="{{ asset('storage/shops/' . $shop->image) }}" width="100" class="mt-2">
                @endif
                @error('image') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-warning mt-3">Update Shop</button>
        </form>
    </div>
@endsection