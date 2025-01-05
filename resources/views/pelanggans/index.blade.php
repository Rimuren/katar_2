@extends('layouts.apperance')

@section('title', 'Data Pelanggan')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Pelanggan</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('pelanggans.create') }}" class="btn btn-success mb-3">
                            <i class="fas fa-plus-circle"></i> Tambah Pelanggan
                        </a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">No. Telepon</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pelanggans as $pel)
                                        <tr>
                                            <td>{{ $pel->namaPelanggan }}</td>
                                            <td>{{ $pel->noTlp }}</td>
                                            <td>{{ $pel->email }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('pelanggans.edit', $pel->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('pelanggans.destroy', $pel->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <div class="alert alert-warning">
                                                    Tidak ada data pelanggan yang tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
