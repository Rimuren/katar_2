<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::getAllSuppliers();
        return SupplierResource::collection($suppliers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();  // Mengambil semua input data dari request
        $supplier = Supplier::createApiSupplier($data); // Membuat supplier baru
        return new SupplierResource($supplier); // Mengembalikan supplier yang baru dibuat
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json(['message' => 'Supplier tidak ditemukan.'], 404);
        }

        return new SupplierResource($supplier);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $result = Supplier::updateApiSupplier($id, $data);

        // Cek apakah hasil sukses atau error
        if ($result['status'] === 'error') {
            return response()->json($result, 400); // 400 Bad Request jika ada error
        }

        return response()->json($result, 200); // 200 OK jika sukses
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Supplier::deleteApiSupplier($id);

        // Cek apakah hasil sukses atau error
        if ($result['status'] === 'error') {
            return response()->json($result, 400); // 400 Bad Request jika ada error
        }

        return response()->json($result, 200); // 200 OK jika sukses

    }
}
