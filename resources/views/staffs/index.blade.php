@extends('layouts.apperance')

@section('title', 'Data Staff')  

@section('content') 
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Staff</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('staffs.create') }}" class="btn btn-md btn-success mb-3">
                        <i class="fas fa-plus-circle"></i> Tambah Staff
                        </a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Staff</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $staff)
                                    <tr>
                                        <td>{{ $staff->namaStaff }}</td>
                                        <td>{{ $staff->idjabatan->namaJabatan ?? 'Tidak ada jabatan' }}</td>
                                        <td>{{ $staff->email }}</td>
                                        <td>{{ $staff->noTlp }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('staffs.destroy', $staff->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if ($staffs->isEmpty())
                            <div class="alert alert-warning text-center">
                                Tidak ada data staff yang tersedia.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
