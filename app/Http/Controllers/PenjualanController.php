<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\barang; 
use App\Models\transaksi;

class PenjualanController extends Controller
{
    // Menampilkan daftar penjualan
    public function index()
    {
        $penjualan = Penjualan::with(['barang', 'transaksi'])->get();
        return response()->json($penjualan);
    }

    // Menampilkan detail penjualan tertentu
    public function show($id)
    {
        $penjualan = Penjualan::with(['barang', 'transaksi'])->find($id);

        if (!$penjualan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($penjualan);
    }

    // Menambahkan data penjualan baru
    public function store(Request $request)
    {
        $request->validate([
            'idTransaksi' => 'required|exists:transaksis,idTransaksi',
            'idBarang' => 'required|exists:barangs,idBarang',
            'banyakPenjualan' => 'required|integer',
            'tglPenjualan' => 'required|date',
        ]);

        $penjualan = Penjualan::create([
            'idTransaksi' => $request->idTransaksi,
            'idBarang' => $request->idBarang,
            'banyakPenjualan' => $request->banyakPenjualan,
            'tglPenjualan' => $request->tglPenjualan,
        ]);

        return response()->json($penjualan, 201);
    }

    // Memperbarui data penjualan
    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::find($id);

        if (!$penjualan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $request->validate([
            'idTransaksi' => 'exists:transaksis,idTransaksi',
            'idBarang' => 'exists:barangs,idBarang',
            'banyakPenjualan' => 'integer',
            'tglPenjualan' => 'date',
        ]);

        $penjualan->update($request->all());

        return response()->json($penjualan);
    }

    // Menghapus data penjualan
    public function destroy($id)
    {
        $penjualan = Penjualan::find($id);

        if (!$penjualan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $penjualan->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
