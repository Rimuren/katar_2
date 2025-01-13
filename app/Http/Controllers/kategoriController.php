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
        Kategori::createKategori(['namaKategori' => $request->namaKategori,]);
        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id); 
        return view('kategoris.edit', compact('kategori')); 
    }

    public function update(Request $request, $id)
    {
        Kategori::updateKategori($id, ['namaKategori' => $request->namaKategori,]);
        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil diubah');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id); 
        $kategori->delete(); 

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil dihapus');
    }
}