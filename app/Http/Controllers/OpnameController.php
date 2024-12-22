<?php

namespace App\Http\Controllers;

use App\Models\Opname;
use App\Models\Barang;
use App\Models\Staff;
use Illuminate\Http\Request;

class OpnameController extends Controller
{
    // Menampilkan daftar opname dengan relasi barang dan staff
    public function index()
    {
        // Ambil semua data opname dengan relasi barang dan staff
        $opnames = Opname::with('barang', 'staff')->get();

        return view('opnames.index', compact('opnames'));
    }

    // Menampilkan form untuk menambahkan opname baru
    public function create()
    {
        // Ambil daftar barang dan staff untuk dropdown
        $barangs = Barang::all();
        $staffs = Staff::all();
        return view('opnames.create', compact('barangs', 'staffs'));
    }

    // Menyimpan opname baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'idbarang' => 'required|exists:barang,id',
            'idstaff' => 'required|exists:staff,id',
            'tglOpname' => 'required|date',
            'stokFisik' => 'required|numeric',
            'stokSistem' => 'nullable|numeric',
            'selisih' => 'nullable|numeric',
        ]);

        // Ambil data barang untuk stokSistem
        $barang = Barang::find($request->idbarang);
        $stokSistem = $barang->stok;

        // Hitung selisih stok (stokFisik - stokSistem)
        $selisih = $request->stokFisik - $stokSistem;

        // Simpan data opname dengan selisih yang dihitung
        Opname::create([
            'idbarang' => $request->idbarang,
            'idstaff' => $request->idstaff,
            'tglOpname' => $request->tglOpname,
            'stokFisik' => $request->stokFisik,
            'stokSistem' => $stokSistem,
            'selisih' => $selisih, // Simpan nilai selisih
        ]);

        return redirect()->route('opnames.index')->with('success', 'Opname berhasil disimpan');
    }

    // Menampilkan form untuk mengedit opname
    public function edit($id)
    {
        // Ambil data opname berdasarkan ID
        $opname = Opname::findOrFail($id);
        $barangs = Barang::all();
        $staffs = Staff::all();
        return view('opnames.edit', compact('opname', 'barangs', 'staffs'));
    }

    // Mengupdate opname yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'idbarang' => 'required|exists:barang,id',
            'idstaff' => 'required|exists:staff,id',
            'tglOpname' => 'required|date',
            'stokFisik' => 'required|numeric',
            'stokSistem' => 'nullable|numeric',
            'selisih' => 'nullable|numeric',
        ]);

        // Ambil data opname berdasarkan ID
        $opname = Opname::findOrFail($id);

        // Ambil data barang untuk stokSistem
        $barang = Barang::find($request->idbarang);
        $stokSistem = $barang->stok;

        // Hitung selisih stok (stokFisik - stokSistem)
        $selisih = $request->stokFisik - $stokSistem;

        // Update data opname dengan selisih yang dihitung
        $opname->update([
            'idbarang' => $request->idbarang,
            'idstaff' => $request->idstaff,
            'tglOpname' => $request->tglOpname,
            'stokFisik' => $request->stokFisik,
            'stokSistem' => $stokSistem,
            'selisih' => $selisih, // Simpan nilai selisih
        ]);

        return redirect()->route('opnames.index')->with('success', 'Opname berhasil diperbarui');
    }

    // Menghapus opname
    public function destroy($id)
    {
        // Cari dan hapus data opname
        $opname = Opname::findOrFail($id);
        $opname->delete();

        return redirect()->route('opnames.index')->with('success', 'Opname berhasil dihapus');
    }
}
