<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BarangResource;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();  // Mengambil semua data barang
        return BarangResource::collection($barang);  // Mengembalikan data barang dalam bentuk resource
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();  // Mengambil semua input data dari request
        $barang = Barang::createBarang($data);  // Membuat barang baru
        return new BarangResource($barang);  // Mengembalikan barang yang baru dibuat
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::find($id);  // Mencari barang berdasarkan ID

        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);  // Barang tidak ditemukan
        }

        return new BarangResource($barang);  // Mengembalikan data barang
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();  // Mengambil data dari request
        $barang = Barang::updateBarang($id, $data);  // Memperbarui barang
        return new BarangResource($barang);  // Mengembalikan barang yang diperbarui
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json(['message' => 'Barang not found'], 404);  // Barang tidak ditemukan
        }

        $barang->delete();  // Menghapus barang
        return response()->json(['message' => 'Barang deleted successfully']);  // Response sukses
    }
}
