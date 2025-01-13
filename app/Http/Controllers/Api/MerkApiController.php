<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MerkResource;
use App\Models\Merk;

class MerkApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merks = Merk::all();
        return MerkResource::collection($merks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();  // Mengambil semua input data dari request
        $merk = Merk::createMerk($data); // Membuat merk baru
        return new MerkResource($merk); // Mengembalikan merk yang baru dibuat
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $merk = Merk::find($id);

        // Jika merk tidak ditemukan
        if (!$merk) {
            return response()->json(['message' => 'Merk tidak ditemukan'], 404);
        }

        return new MerkResource($merk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $merk = Merk::find($id);

        // Jika merk tidak ditemukan
        if (!$merk) {
            return response()->json(['message' => 'Merk tidak ditemukan'], 404);
        }

        // Validasi input data
        $data = $request->all(); // Mengambil data dari request

        // Update merk
        $Merk = Merk::updateMerk($id, $data); // Memperbarui merk

        return new MerkResource($merk); // Mengembalikan merk yang diperbarui
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $merk = Merk::find($id);

        // Jika merk tidak ditemukan
        if (!$merk) {
            return response()->json(['message' => 'Merk tidak ditemukan']);
        }

        $merk->delete();
        return response()->json(['message' => 'Merk berhasil dihapus']);
    }
}
