@extends('layouts.apperance')   

@section('title', 'Data Barang')  

@section('content') 
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Barang</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('barangs.create') }}" class="btn btn-md btn-success mb-3">Tambah Barang</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Merk</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Harga Beli</th>
                                    <th scope="col">Harga Jual</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $barang)
                                    <tr>
                                        <td>{{ $barang->namaBarang }}</td>
                                        <td>{{ $barang->kategori->namaKategori }}</td> 
                                        <td>{{ $barang->merk->namaMerk }}</td>    
                                        <td>{{ $barang->stok }}</td>
                                        <td>{{ number_format($barang->hargaBeli, 0, ',', '.') }}</td>
                                        <td>{{ number_format($barang->hargaJual, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if ($barangs->isEmpty())
                            <div class="alert alert-warning text-center">
                                Tidak ada data barang yang tersedia.
                            </div>
                        @endif
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection  
