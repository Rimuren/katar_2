<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\JabatanResource;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = Jabatan::all();
        return JabatanResource::collection($jabatan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $jabatan = Jabatan::create($data);

        return response()->json([
            'message' => 'Jabatan berhasil ditambahkan.',
            'data' => new JabatanResource($jabatan),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jabatan = Jabatan::findOrFail($id);

        // Jika jabatan tidak ditemukan
        if (!$jabatan) {
            return response()->json(['message' => 'Jabatan tidak ditemukan'], 404);
        }

        return new JabatanResource($jabatan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jabatan = Jabatan::findOrFail($id);

        // Jika jabatan tidak ditemukan
        if (!$jabatan) {
            return response()->json(['message' => 'Merk tidak ditemukan'], 404);
        }

        // Validasi input data
        $data = $request->all(); // Mengambil data dari request

        // Update merk
        $jabatan->update($data); // Memperbarui merk

        return new JabatanResource($jabatan); // Mengembalikan merk yang diperbarui
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jabatan = Jabatan::find($id);

        // Jika jabatan tidak ditemukan
        if (!$jabatan) {
            return response()->json(['message' => 'Jabatan tidak ditemukan']);
        }

        $jabatan->delete();
        return response()->json(['message' => 'Jabatan berhasil dihapus']);
    }
}
