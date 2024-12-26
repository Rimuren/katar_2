<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategoris.index', compact('kategoris')); 
    }

    public function create()
    {
        return view('kategoris.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaKategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'namaKategori' => $request->namaKategori,
        ]);

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id); 
        return view('kategoris.edit', compact('kategori')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaKategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'namaKategori' => $request->namaKategori,
        ]);

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil diubah');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id); 
        $kategori->delete(); 

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil dihapus');
    }
}

