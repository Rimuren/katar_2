<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Barang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPenjualan = Penjualan::sum('totalHarga');
        $totalPelanggan = Pelanggan::count();
        $totalStok = Barang::sum('stok');

        // Data untuk grafik
        $bulan = ['Januari', 'Februari', 'Maret', 'April']; 
        $dataPenjualan = [50000, 70000, 80000, 60000];

        return view('dashboard.index', compact('totalPenjualan', 'totalPelanggan', 'totalStok', 'bulan', 'dataPenjualan'));
    }
}
