<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategoris.index', compact('kategoris')); 
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('kategoris.create'); 
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        // Memanggil model untuk membuat kategori
        Kategori::createKategori([
            'namaKategori' => $request->namaKategori,
        ]);

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id); 
        return view('kategoris.edit', compact('kategori')); 
    }

    // Memperbarui kategori
    public function update(Request $request, $id)
    {
        // Memanggil model untuk memperbarui kategori
        Kategori::updateKategori($id, [
            'namaKategori' => $request->namaKategori,
        ]);

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil diubah');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id); 
        $kategori->delete(); 

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil dihapus');
    }
}