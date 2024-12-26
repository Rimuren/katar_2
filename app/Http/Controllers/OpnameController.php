<?php

namespace App\Http\Controllers;

use App\Models\Opname;
use App\Models\Barang;
use App\Models\Staff;
use Illuminate\Http\Request;

class OpnameController extends Controller
{
    public function index()
    {
        $opnames = Opname::with('barang', 'staff')->get();

        return view('opnames.index', compact('opnames'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $staffs = Staff::all();
        return view('opnames.create', compact('barangs', 'staffs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'idbarang' => 'required|exists:barang,id',
            'idstaff' => 'required|exists:staff,id',
            'tglOpname' => 'required|date',
            'stokFisik' => 'required|numeric',
            'stokSistem' => 'nullable|numeric',
            'selisih' => 'nullable|numeric',
        ]);
        $barang = Barang::find($request->idbarang);
        $stokSistem = $barang->stok;

        $selisih = $request->stokFisik - $stokSistem;

        Opname::create([
            'idbarang' => $request->idbarang,
            'idstaff' => $request->idstaff,
            'tglOpname' => $request->tglOpname,
            'stokFisik' => $request->stokFisik,
            'stokSistem' => $stokSistem,
            'selisih' => $selisih,
        ]);

        return redirect()->route('opnames.index')->with('success', 'Opname berhasil disimpan');
    }

    public function edit($id)
    {
        $opname = Opname::findOrFail($id);
        $barangs = Barang::all();
        $staffs = Staff::all();
        return view('opnames.edit', compact('opname', 'barangs', 'staffs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idbarang' => 'required|exists:barang,id',
            'idstaff' => 'required|exists:staff,id',
            'tglOpname' => 'required|date',
            'stokFisik' => 'required|numeric',
            'stokSistem' => 'nullable|numeric',
            'selisih' => 'nullable|numeric',
        ]);

        $opname = Opname::findOrFail($id);

        $barang = Barang::find($request->idbarang);
        $stokSistem = $barang->stok;

        $selisih = $request->stokFisik - $stokSistem;

        $opname->update([
            'idbarang' => $request->idbarang,
            'idstaff' => $request->idstaff,
            'tglOpname' => $request->tglOpname,
            'stokFisik' => $request->stokFisik,
            'stokSistem' => $stokSistem,
            'selisih' => $selisih
        ]);

        return redirect()->route('opnames.index')->with('success', 'Opname berhasil diperbarui');
    }

    public function destroy($id)
    {
        $opname = Opname::findOrFail($id);
        $opname->delete();

        return redirect()->route('opnames.index')->with('success', 'Opname berhasil dihapus');
    }
}
