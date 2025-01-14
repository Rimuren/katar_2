<<<<<<< HEAD
@extends('layouts.app') 
=======
@extends('layouts.apperance')
>>>>>>> 2b938c89418aca66050c5faa2af7eeebc53aa142

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
<<<<<<< HEAD
                        <a href="{{ route('staffs.create') }}" class="btn btn-md btn-success mb-3">Tambah Staff</a>
=======
                        <a href="{{ route('staffs.create') }}" class="btn btn-md btn-success mb-3">
                        <i class="fas fa-plus-circle"></i> Tambah Staff
                        </a>
>>>>>>> 2b938c89418aca66050c5faa2af7eeebc53aa142
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Staff</th>
<<<<<<< HEAD
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Aksi</th>
=======
                                    <th scope="col">Sebagai</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col" class="text-center">Aksi</th>
>>>>>>> 2b938c89418aca66050c5faa2af7eeebc53aa142
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $staff)
                                    <tr>
                                        <td>{{ $staff->namaStaff }}</td>
<<<<<<< HEAD
                                        <td>{{ $staff->jabatan->namaJabatan }}</td> 
                                        <td>{{ $staff->email }}</td>    
                                        <td>{{ $staff->noTlp }}</td>
                                        <td>
                                            <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('staffs.destroy', $staff->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
=======
                                        <td>{{ $staff->sebagai }}</td>
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
>>>>>>> 2b938c89418aca66050c5faa2af7eeebc53aa142
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
<<<<<<< HEAD
@endsection  
=======
@endsection
>>>>>>> 2b938c89418aca66050c5faa2af7eeebc53aa142
