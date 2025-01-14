@extends('layouts.apperance')

@section('title', 'Penukaran')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Penukaran</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Shop</th>
                    <th>Poin yang Digunakan</th>
                    <th>Tanggal Penukaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penukarans as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->pelanggan->name }}</td>
                        <td>{{ $item->shop->name }}</td>
                        <td>{{ $item->pointUsed }}</td>
                        <td>{{ $item->tglReedem }}</td>
                        <td>
                            <form action="{{ route('penukaran.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
