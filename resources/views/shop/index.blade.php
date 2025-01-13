@extends('layouts.apperance')

@section('title', 'Shop List')

@section('content')
    <div class="container">
        <h1 class="my-4">Shop List</h1>
        <a href="{{ route('shop.create') }}" class="btn btn-primary mb-3">Add New Shop</a>
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Barang</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shops as $shop)
                        <tr>
                            <td>{{ $shop->idshop }}</td>
                            <td>{{ $shop->name }}</td>
                            <td>{{ $shop->barang->namaBarang }}</td>
                            <td>
                                @if ($shop->image)
                                    <img src="{{ asset('storage/shops/' . $shop->image) }}" width="100">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('shop.edit', $shop->idshop) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('shop.destroy', $shop->idshop) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
