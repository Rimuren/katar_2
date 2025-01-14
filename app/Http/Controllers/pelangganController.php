<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all(); 
        return view('pelanggans.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggans.create'); 
    }

    public function store(Request $request)
    {
        Pelanggan::createPelanggan($request->all());
        return redirect()->route('pelanggans.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id); 
        return view('pelanggans.edit', compact('pelanggan')); 
    }

    public function update(Request $request, $id)
    {
        Pelanggan::updatePelanggan($id, $request->all());
        return redirect()->route('pelanggans.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id); 
        $pelanggan->delete(); 
        return redirect()->route('pelanggans.index')->with('success', 'Pelanggan berhasil dihapus');
    }
}
