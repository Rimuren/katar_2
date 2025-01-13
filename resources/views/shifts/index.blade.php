@extends('layouts.apperance')  

@section('title', 'Data Shift')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Daftar Shift</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('shifts.create') }}" class="btn btn-success mb-3">
                        <i class="fas fa-plus-circle"></i> Tambah Shift
                    </a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Staff</th>
                                <th>Jam Kerja</th>
                                <th>Jam Pulang</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shifts as $index => $shift)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $shift->staff->namaStaff }}</td>
                                    <td>{{ $shift->jamKerja }}</td>
                                    <td>{{ $shift->jamPulang }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('shifts.edit', $shift->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('shifts.destroy', $shift->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus shift ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($shifts->isEmpty())
                        <div class="alert alert-warning text-center">
                            Tidak ada data shift yang tersedia.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
