<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    // Menampilkan semua merk
    public function index()
    {
        $merks = Merk::all();
        return view('merks.index', compact('merks'));
    }

    // Menampilkan form untuk membuat merk baru
    public function create()
    {
        return view('merks.create');
    }

    // Menyimpan merk baru
    public function store(Request $request)
    {
        // Memanggil model untuk membuat merk
        Merk::createMerk([
            'namaMerk' => $request->namaMerk,
        ]);

        return redirect()->route('merks.index')->with('success', 'Merk berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit merk
    public function edit($id)
    {
        $merk = Merk::findOrFail($id);
        return view('merks.edit', compact('merk'));
    }

    // Memperbarui data merk
    public function update(Request $request, $id)
    {
        // Memanggil model untuk memperbarui data merk
        Merk::updateMerk($id, [
            'namaMerk' => $request->namaMerk,
        ]);

        return redirect()->route('merks.index')->with('success', 'Merk berhasil diperbarui.');
    }

    // Menghapus merk
    public function destroy($id)
    {
        $merk = Merk::findOrFail($id);
        $merk->delete();

        return redirect()->route('merks.index')->with('success', 'Merk berhasil dihapus.');
    }
}