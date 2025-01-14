<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\kategoriResource;
use App\Models\kategori;

class KategoriApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();  // Mengambil semua data kategori
        return KategoriResource::collection($kategori); // Mengembalikan data kategori dalam bentuk resource
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();  // Mengambil semua input data dari request
        $kategori = Kategori::createKategori($data);  // Membuat kategori baru
        return new KategoriResource($kategori);  // Mengembalikan kategori yang baru dibuat
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::find($id);  // Mencari kategori berdasarkan ID

        if (!$kategori) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);  // Kategori tidak ditemukan
        }

        return new KategoriResource($kategori);  // Mengembalikan data kategori
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();  // Mengambil data dari request
        $kategori = Kategori::updateKategori($id, $data);  // Memperbarui kategori
        return new KategoriResource($kategori);  // Mengembalikan kategori yang diperbarui
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);  // Kategori tidak ditemukan
        }

        $kategori->delete();  // Menghapus kategori
        return response()->json(['message' => 'Kategori berhasil dihapus']);  // Response sukses
    }
}
