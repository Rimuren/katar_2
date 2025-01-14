<?php

use App\Http\Controllers\Api\BarangApiController;
use App\Http\Controllers\Api\KategoriApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MerkApiController;
use App\Http\Controllers\Api\PelangganApiController;
use App\Http\Controllers\Api\SupplierApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    Route::resource('merks', MerkApiController::class);
    Route::resource('kategoris', KategoriApiController::class);
    Route::resource('barangs', BarangApiController::class);
    Route::resource('pelanggans', PelangganApiController::class);
    Route::resource('suppliers', SupplierApiController::class);
})->middleware('auth:sanctum');