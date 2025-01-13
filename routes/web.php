<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CashDrawerController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guests.index');
}); 

// dashboard
Route::resource('dashboard', DashboardController::class);

// CRUD transaksi
Route::resource('transaksis',TransaksiController::class);

// CRUD supplier
Route::resource('suppliers', SupplierController::class);

// CRUD barang
Route::resource('barangs', BarangController::class);

// CRUD kategori
Route::resource('kategoris', KategoriController::class);

// CRUD merk
Route::resource('merks', MerkController::class);

// CRUD pelanggan
Route::resource('pelanggans', PelangganController::class);

// CRUD staff
Route::resource('staffs', StaffController::class);

// CRUD shift
Route::resource('shifts', ShiftController::class);

// CRUD cashdrawer
Route::resource('cashdrawers', CashdrawerController::class);

// CRUD opname
Route::resource('opnames',OpnameController::class);


