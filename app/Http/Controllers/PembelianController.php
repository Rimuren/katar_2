<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\barang;
use App\Models\supplier;
use App\Models\transaksi;

class PembelianController extends Controller
{
    // Menampilkan daftar pembelian
    public function index()
    {
        $pembelian = Pembelian::with(['barang', 'supplier', 'transaksi'])->get();
        return response()->json($pembelian);
    }

    // Menampilkan detail pembelian tertentu
    public function show($id)
    {
        $pembelian = Pembelian::with(['barang', 'supplier', 'transaksi'])->find($id);

        if (!$pembelian) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($pembelian);
    }

    // Menambahkan data pembelian baru
    public function store(Request $request)
    {
        $request->validate([
            'idTransaksi' => 'required|exists:transaksis,idTransaksi',
            'idBarang' => 'required|exists:barangs,idBarang',
            'idSupplier' => 'required|exists:suppliers,idSupplier',
            'banyak' => 'required|integer',
            'tglPembelian' => 'required|date',
        ]);

        $pembelian = Pembelian::create([
            'idTransaksi' => $request->idTransaksi,
            'idBarang' => $request->idBarang,
            'idSupplier' => $request->idSupplier,
            'banyak' => $request->banyak,
            'tglPembelian' => $request->tglPembelian,
        ]);

        return response()->json($pembelian, 201);
    }

    // Memperbarui data pembelian
    public function update(Request $request, $id)
    {
        $pembelian = Pembelian::find($id);

        if (!$pembelian) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $request->validate([
            'idTransaksi' => 'exists:transaksis,idTransaksi',
            'idBarang' => 'exists:barangs,idBarang',
            'idSupplier' => 'exists:suppliers,idSupplier',
            'banyak' => 'integer',
            'tglPembelian' => 'date',
        ]);

        $pembelian->update($request->all());

        return response()->json($pembelian);
    }

    // Menghapus data pembelian
    public function destroy($id)
    {
        $pembelian = Pembelian::find($id);

        if (!$pembelian) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $pembelian->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
