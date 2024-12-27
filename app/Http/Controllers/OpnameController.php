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
        // Mengambil semua data opname dengan relasi barang dan staff
        $opnames = Opname::with('barang', 'staff')->get();
        return view('opnames.index', compact('opnames'));
    }

    public function create()
    {
        // Mengambil semua data barang dan staff
        $barangs = Barang::all();
        $staffs = Staff::all();
        return view('opnames.create', compact('barangs', 'staffs'));
    }

    public function store(Request $request)
    {
        // Menyimpan data opname menggunakan model
        $result = Opname::createOpname($request->all());

        // Mengirimkan respon berdasarkan hasil dari model
        if (isset($result['errors'])) {
            return redirect()->back()->withErrors($result['errors'])->withInput();
        }

        return redirect()->route('opnames.index')->with('success', $result['success']);
    }

    public function edit($id)
    {
        // Mengambil data opname untuk diedit, dan data barang serta staff
        $opname = Opname::findOrFail($id);
        $barangs = Barang::all();
        $staffs = Staff::all();
        return view('opnames.edit', compact('opname', 'barangs', 'staffs'));
    }

    public function update(Request $request, $id)
    {
        // Memperbarui data opname menggunakan model
        $result = Opname::updateOpname($id, $request->all());

        // Mengirimkan respon berdasarkan hasil dari model
        if (isset($result['errors'])) {
            return redirect()->back()->withErrors($result['errors'])->withInput();
        }

        return redirect()->route('opnames.index')->with('success', $result['success']);
    }

    public function destroy($id)
    {
        $opname = Opname::findOrFail($id);
        $opname->delete();

        return redirect()->route('opnames.index')->with('success', 'Opname berhasil dihapus');
    }
}