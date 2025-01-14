@extends('layouts.apperance')  

@section('title', 'Data Transaksi') 

@section('content')  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Transaksi</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('transaksis.create') }}" class="btn btn-md btn-success mb-3">
                            <i class="fa fa-plus-circle"></i> Tambah Transaksi
                        </a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Nama Staff</th>
                                    <th scope="col">Nama Transaksi</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                    <th scope="col">Total Transaksi</th>
                                    <th scope="col">Tipe Transaksi</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksis as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->id }}</td>
                                    <td>{{ $transaksi->pelanggan->namaPelanggan }}</td>
                                    <td>{{ $transaksi->staff->namaStaff }}</td>
                                    <td>{{ $transaksi->namaTransaksi }}</td>
                                    <td>{{ $transaksi->tglTransaksi }}</td>
                                    <td>{{ $transaksi->totalTransaksi }}</td>
                                    <td>{{ $transaksi->tipeTransaksi }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('transaksis.edit', $transaksi->id) }}" class="btn btn-primary btn-sm">
                                          <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if ($transaksis->isEmpty())
                            <div class="alert alert-warning text-center">
                                Tidak ada data transaksi yang tersedia.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
