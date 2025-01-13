@extends('layouts.apperance')

@section('title', 'Edit Poin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Poin</h1>
        <form action="{{ route('poin.update', $poin->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="barang_id" class="form-label">Barang</label>
                <select class="form-control" id="barang_id" name="barang_id" required>
                    <option value="{{ $poin->barang_id }}">{{ $poin->barang->name }}</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="min_harga" class="form-label">Min Harga</label>
                <input type="number" class="form-control" id="min_harga" name="min_harga" value="{{ $poin->min_harga }}" required>
            </div>
            <div class="mb-3">
                <label for="max_harga" class="form-label">Max Harga</label>
                <input type="number" class="form-control" id="max_harga" name="max_harga" value="{{ $poin->max_harga }}" required>
            </div>
            <div class="mb-3">
                <label for="poin" class="form-label">Poin</label>
                <input type="number" class="form-control" id="poin" name="poin" value="{{ $poin->poin }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
