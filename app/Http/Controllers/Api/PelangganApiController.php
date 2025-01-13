<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PelangganResource;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return PelangganResource::collection($pelanggan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();  // Mengambil semua input data dari request
        $pelanggan = Pelanggan::create($data); // Membuat pelanggan baru
        return new PelangganResource($pelanggan); // Mengembalikan pelanggan yang baru dibuat
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json(['message' => 'Pelanggan tidak ditemukan.'], 404);
        }

        return new PelangganResource($pelanggan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        // Jika merk tidak ditemukan
        if (!$pelanggan) {
            return response()->json(['message' => 'Pelanggan tidak ditemukan'], 404);
        }

        // Validasi input data
        $data = $request->all(); // Mengambil data dari request

        // Update merk
        $pelanggan = Pelanggan::updatePelanggan($id, $data); // Memperbarui pelanggan

        return new PelangganResource($pelanggan); // Mengembalikan pelanggan yang diperbarui
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::find($id);

        // Jika pelanggan tidak ditemukan
        if (!$pelanggan) {
            return response()->json(['message' => 'Pelanggan tidak ditemukan']);
        }

        $pelanggan->delete();
        return response()->json(['message' => 'Pelanggan berhasil dihapus']);
    }
}
