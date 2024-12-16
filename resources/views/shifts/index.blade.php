@extends('layouts.app')

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
                    <a href="{{ route('shifts.create') }}" class="btn btn-success mb-3">Tambah Shift</a>
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
                                    <td class="text-center"> <!-- Menambahkan class 'text-center' di sini -->
                                        <a href="{{ route('shifts.edit', $shift->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('shifts.destroy', $shift->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus shift ini?')">Hapus</button>
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
