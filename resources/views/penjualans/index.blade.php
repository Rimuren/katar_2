@extends('layouts.apperance')

@section('title', 'Daftar Penjualan')

@section('content')
<div class="container">
    <h1>Daftar Penjualan</h1>
    <a href="{{ route('penjualans.create') }}" class="btn btn-primary">Tambah Penjualan</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Transaksi</th>
                <th>Barang</th>
                <th>Quantity</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualans as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->transaksi->id }}</td>
                <td>{{ $item->barang->namaBarang }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->totalHarga }}</td>
                <td>
                    <a href="{{ route('penjualans.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('penjualans.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

