<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShiftResource;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifts = Shift::getAllShifts();
        return ShiftResource::collection($shifts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = Shift::storeShift($request);

        if ($result['status'] === 'error') {
            return response()->json(['message' => $result['message']], 400);
        }

        return response()->json(['message' => $result['message']], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Cari shift berdasarkan ID
        $shift = Shift::findOrFail($id);

        // Jika shift tidak ditemukan
        if (!$shift) {
            return response()->json(['message' => 'Shift tidak ditemukan.'], 404);
        }

        // Kembalikan shift dengan resource
        return new ShiftResource($shift);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = Shift::updateShift($request, $id);

        if ($result['status'] === 'error') {
            return response()->json(['message' => $result['message']], 400);
        }

        return response()->json(['message' => $result['message']], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari shift berdasarkan ID
        $shift = Shift::find($id);

        // Jika shift tidak ditemukan
        if (!$shift) {
            return response()->json(['message' => 'Transaksi tidak ditemukan.'], 404);
        }

        // Hapus shift
        Shift::deleteShift($id);

        // Kembalikan respons sukses
        return response()->json(['message' => 'Shift berhasil dihapus.']);
    }
}
