@extends('layouts.apperance')  

@section('title', 'Data Merk') 

@section('content')  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Merk</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('merks.create') }}" class="btn btn-success mb-3">
                            <i class="fas fa-plus-circle"></i> Tambah Merk
                        </a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-center">Nama Merk</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($merks as $merk)
                                        <tr>
                                            <td>{{ $merk->namaMerk }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('merks.edit', $merk->id) }}" class="btn btn-primary btn-sm px-2 py-1">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('merks.destroy', $merk->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm px-2 py-1" onclick="return confirm('Apakah Anda yakin?')">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if ($merks->isEmpty())
                            <div class="alert alert-warning text-center">
                                Tidak ada data merk yang tersedia.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
