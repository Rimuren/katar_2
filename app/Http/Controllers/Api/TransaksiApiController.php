<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransaksiResource;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return TransaksiResource::collection($transaksi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ambil data dari request
        $data = $request->all();

        // Panggil metode createTransaksi dari model Transaksi
        $result = Transaksi::createTransaksiApi($data);

        // Jika ada error dalam validasi
        if (isset($result['errors'])) {
            return response()->json($result, 400);
        }

        // Jika berhasil
        return response()->json(new TransaksiResource($result['data']), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cari transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Jika transaksi tidak ditemukan
        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan.'], 404);
        }

        // Kembalikan transaksi dengan resource
        return new TransaksiResource($transaksi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil data dari request
        $data = $request->all();

        // Panggil metode updateTransaksi dari model Transaksi
        $result = Transaksi::updateTransaksiApi($id, $data);

        // Jika ada error dalam validasi
        if (isset($result['errors'])) {
            return response()->json($result, 400);
        }

        // Jika berhasil
        return new TransaksiResource($result['data']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari transaksi berdasarkan ID
        $transaksi = Transaksi::find($id);

        // Jika transaksi tidak ditemukan
        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan.'], 404);
        }

        // Hapus transaksi
        Transaksi::deleteTransaksiApi($id);

        // Kembalikan respons sukses
        return response()->json(['message' => 'Transaksi berhasil dihapus.']);
    }
}
