<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Merk;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all(); 
        return view('barangs.index', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all(); 
        $merks = Merk::all();
        return view('barangs.create', compact('kategoris', 'merks')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaBarang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'hargaBeli' => 'required|numeric|min:0',
            'hargaJual' => 'required|numeric|min:0',
            'idkategori' => 'required|exists:kategori,id',
            'idmerk' => 'required|exists:merk,id',
        ]);
    
        Barang::create([
            'namaBarang' => $request->namaBarang,
            'stok' => $request->stok,
            'hargaBeli' => $request->hargaBeli,
            'hargaJual' => $request->hargaJual,
            'idkategori' => $request->idkategori,
            'idmerk' => $request->idmerk,
        ]);
    
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $barang = Barang::findOrFail($id); 
        $kategoris = Kategori::all(); 
        $merks = Merk::all(); 
        return view('barangs.edit', compact('barang', 'kategoris', 'merks')); 
    }

    public function update(Request $request, Barang $barang)
{
    $request->validate([
        'namaBarang' => 'required|string|max:255',
        'stok' => 'required|integer|min:0',
        'hargaBeli' => 'required|numeric|min:0',
        'hargaJual' => 'required|numeric|min:0',
        'idkategori' => 'required|exists:kategori,id',
        'idmerk' => 'required|exists:merk,id',
    ]);

    $barang->update([
        'namaBarang' => $request->namaBarang,
        'stok' => $request->stok,
        'hargaBeli' => $request->hargaBeli,
        'hargaJual' => $request->hargaJual,
        'idkategori' => $request->idkategori,
        'idmerk' => $request->idmerk,
    ]);

    return redirect()->route('barangs.index')->with('success', 'Barang berhasil diperbarui.');
}

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id); 
        $barang->delete(); 

    
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus');
    }
}

