<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    // Menampilkan daftar jabatan
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('jabatans.index', compact('jabatans'));
    }

    // Menampilkan form untuk tambah jabatan
    public function create()
    {
        return view('jabatans.create');
    }

    // Menyimpan jabatan baru
    public function store(Request $request)
    {
        $request->validate([
            'namaJabatan' => 'required|string|max:255|unique:jabatan,namaJabatan',
        ]);

        Jabatan::create($request->all());

        return redirect()->route('jabatans.index')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    // Menampilkan form untuk edit jabatan
    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('jabatans.edit', compact('jabatan'));
    }

    // Mengupdate jabatan
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaJabatan' => 'required|string|max:255|unique:jabatan,namaJabatan,' . $id,
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($request->all());

        return redirect()->route('jabatans.index')->with('success', 'Jabatan berhasil diperbarui.');
    }

    // Menghapus jabatan
    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatans.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}
