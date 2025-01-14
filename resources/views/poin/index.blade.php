@extends('layouts.apperance')

@section('title', 'Poin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Poin</h1>
        <a href="{{ route('poin.create') }}" class="btn btn-primary mb-3">Tambah Poin</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Barang</th>
                    <th>Min Harga</th>
                    <th>Max Harga</th>
                    <th>Poin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($poin as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->barang->name }}</td>
                        <td>{{ $item->min_harga }}</td>
                        <td>{{ $item->max_harga }}</td>
                        <td>{{ $item->poin }}</td>
                        <td>
                            <a href="{{ route('poin.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('poin.destroy', $item->id) }}" method="POST" style="display:inline-block;">
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
