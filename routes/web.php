<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CashDrawerController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\JabatanController;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Route;

// tampilan awal sebelum login
Route::get('/', [HomeController::class, 'guest'])->name('guests.home');

// index,create,store,show,edit,update,destroy
Route::get('/home', [HomeController::class, 'user'])->name('user.home');

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

// CRUD jabatan
Route::resource('jabatans', JabatanController::class);

// CRUD shop
Route::resource('shops', ShopController::class);

// CRUD cashdrawer
Route::resource('cashdrawers', CashdrawerController::class);

// CRUD opname
Route::resource('opnames',OpnameController::class);

// CRUD penjualan
Route::resource('penjualans',PenjualanController::class);

// LOGIN
Route::get('guest/login/daftar', [LoginController::class, 'Daftar'])->name('guests.daftar');
Route::get('guest/login/masuk', [LoginController::class, 'Masuk'])->name('guests.masuk');
Route::post('guest/login/daftar', [LoginController::class, 'submitDaftar'])->name('guests.daftar.submit');
Route::post('guest/login/masuk', [LoginController::class, 'submitMasuk'])->name('guests.masuk.submit');
