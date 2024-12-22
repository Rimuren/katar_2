@extends('layouts.apperance')

@section('title', 'Data Opname')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Opname</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('opnames.create') }}" class="btn btn-success mb-3">
                            <i class="fas fa-plus-circle"></i> Tambah Opname
                        </a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Barang</th>
                                        <th scope="col">Staff</th>
                                        <th scope="col">Tanggal Opname</th>
                                        <th scope="col">Stok Fisik</th>
                                        <th scope="col">Stok Sistem</th>
                                        <th scope="col">Selisih</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($opnames as $opname)
                                        <tr>
                                            <td>{{ $opname->barang->namaBarang }}</td>
                                            <td>{{ $opname->staff->namaStaff }}</td>
                                            <td>{{ \Carbon\Carbon::parse($opname->tglOpname)->format('d-m-Y') }}</td>
                                            <td>{{ $opname->stokFisik }}</td>
                                            <td>{{ $opname->stokSistem }}</td>
                                            <td>{{ $opname->selisih }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('opnames.edit', $opname->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('opnames.destroy', $opname->id) }}" method="POST" style="display:inline;">
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
                                            <td colspan="7" class="text-center">
                                                <div class="alert alert-warning">
                                                    Tidak ada data opname yang tersedia.
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
