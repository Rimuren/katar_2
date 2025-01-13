@extends('layouts.apperance')  

@section('title', 'Tambah Barang')  

@section('content')  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header">
                        <h3>Tambah Barang</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('barangs.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="namaBarang">Nama Barang</label>
                                <input type="text" name="namaBarang" id="namaBarang" class="form-control" placeholder="Masukkan nama barang" required>
                                @error('namaBarang')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="idkategori">Kategori</label>
                                <select name="idkategori" id="idkategori" class="form-control" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->namaKategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="idmerk">Merk</label>
                                <select name="idmerk" id="idmerk" class="form-control" required>
                                    <option value="" disabled selected>Pilih Merk</option>
                                    @foreach ($merks as $merk)
                                        <option value="{{ $merk->id }}">{{ $merk->namaMerk }}</option>
                                    @endforeach
                                </select>
                                @error('merk_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukkan jumlah stok" required>
                                @error('stok')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="hargaBeli">Harga Beli</label>
                                <input type="number" name="hargaBeli" id="hargaBeli" class="form-control" placeholder="Masukkan harga beli" required>
                                @error('hargaBeli')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="hargaJual">Harga Jual</label>
                                <input type="number" name="hargaJual" id="hargaJual" class="form-control" placeholder="Masukkan harga jual" required>
                                @error('hargaJual')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary mt-3 mr-1">Simpan</button>
                                <a href="{{ route('barangs.index') }}" class="btn btn-secondary mt-3">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  
