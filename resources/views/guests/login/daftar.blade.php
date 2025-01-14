@extends('guests.layouts.login')  

@section('title', 'Daftar')

@section('content')
    <div class="container">
        <h2>Halaman Daftar</h2>
        
        <form action="{{ route('guests.daftar.submit') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
        
        <p>Sudah punya akun? <a href="{{ route('guests.masuk') }}">Masuk</a></p>
    </div>
@endsection