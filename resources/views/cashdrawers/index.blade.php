@extends('layouts.apperance')

@section('title', 'Data Cash Drawer')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Cash Drawer</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('cashdrawers.create') }}" class="btn btn-md btn-success mb-3">
                            <i class="fas fa-plus-circle"></i> Tambah Cash Drawer
                        </a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Staff</th>
                                    <th scope="col">Jam Buka</th>
                                    <th scope="col">Jam Tutup</th>
                                    <th scope="col">Saldo Awal</th>
                                    <th scope="col">Saldo Akhir</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cashdrawers as $cashdrawer)
                                    <tr>
                                        <td>{{ $cashdrawer->shift->staff->namaStaff }}</td>
                                        <td>{{ $cashdrawer->jamBuka }}</td>
                                        <td>{{ $cashdrawer->jamTutup }}</td>
                                        <td>{{ number_format($cashdrawer->saldoAwal, 0, ',', '.') }}</td>
                                        <td>{{ number_format($cashdrawer->saldoAkhir, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('cashdrawers.edit', $cashdrawer->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('cashdrawers.destroy', $cashdrawer->id) }}" method="POST" style="display:inline;">
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

                        @if ($cashdrawers->isEmpty())
                            <div class="alert alert-warning text-center">
                                Tidak ada data cash drawer yang tersedia.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection