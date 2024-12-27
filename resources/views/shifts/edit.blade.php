@extends('layouts.apperance')   

@section('content')
<div class="container">
    <h1>Edit Shift</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('shifts.update', $shift->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="idstaff" class="form-label">Nama Staff</label>
            <select name="idstaff" id="idstaff" class="form-select" required>
                    <option value="" disabled selected>Pilih Staff</option>
                @foreach ($staffs as $staff)
                    <option value="{{ $staff->id }}" {{ $shift->idstaff == $staff->id ? 'selected' : '' }}>
                        {{ $staff->namaStaff }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jamKerja" class="form-label">Jam Kerja</label>
            <input 
                type="time" 
                name="jamKerja" 
                id="jamKerja" 
                class="form-control" 
                value="{{ \Carbon\Carbon::parse($shift->jamKerja)->format('H:i') }}" 
                required>
        </div>
        <div class="mb-3">
            <label for="jamPulang" class="form-label">Jam Pulang</label>
            <input 
                type="time" 
                name="jamPulang" 
                id="jamPulang" 
                class="form-control" 
                value="{{ \Carbon\Carbon::parse($shift->jamPulang)->format('H:i') }}" 
                required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('shifts.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
