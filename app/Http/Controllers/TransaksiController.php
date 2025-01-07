<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Staff;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['pelanggan', 'staff'])->get();
        return view('transaksis.index', compact('transaksis'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $staffs = Staff::all();
        return view('transaksis.create', compact('pelanggans', 'staffs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'idPelanggan' => 'required|exists:pelanggan,id',
            'idStaff' => 'required|exists:staff,id',
            'namaTransaksi' => 'required|string|max:255',
            'tglTransaksi' => 'required|date',
            'totalTransaksi' => 'required|integer|min:0',
            'tipeTransaksi' => 'required|in:beli,tukar',
        ]);

        Transaksi::create($data);
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pelanggans = Pelanggan::all();
        $staffs = Staff::all();
        return view('transaksis.edit', compact('transaksi', 'pelanggans', 'staffs'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $data = $request->validate([
            'idPelanggan' => 'required|exists:pelanggan,id',
            'idStaff' => 'required|exists:staff,id',
            'namaTransaksi' => 'required|string|max:255',
            'tglTransaksi' => 'required|date',
            'totalTransaksi' => 'required|integer|min:0',
            'tipeTransaksi' => 'required|in:beli,tukar',
        ]);

        $transaksi->update($data);
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
