<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StaffResource;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::with('jabatan')->get();
        return StaffResource::collection($staff);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = Staff::storeStaff($request);

        if ($result['status'] === 'error') {
            return response()->json([
                'message' => $result['message'],
            ], 422);
        }

        return response()->json([
            'message' => $result['message'],
            'data' => new StaffResource($result['data']),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staff = Staff::findOrFail($id);

        // Jika staff tidak ditemukan
        if (!$staff) {
            return response()->json(['message' => 'Staff tidak ditemukan'], 404);
        }

        return new StaffResource($staff);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = Staff::updateStaff($request, $id);

        if ($result['status'] === 'error') {
            return response()->json([
                'message' => $result['message'],
            ], 422);
        }

        return response()->json([
            'message' => $result['message'],
            'data' => new StaffResource($result['data']),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Staff::deleteStaff($id);

        // Cek apakah hasil sukses atau error
        if ($result['status'] === 'error') {
            return response()->json($result, 400); // 400 Bad Request jika ada error
        }

        return response()->json($result, 200); // 200 OK jika sukses
    }
}
