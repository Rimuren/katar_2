<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::getAllPenjualan();
        return view('penjualans.index', compact('penjualans'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $transaksis = Transaksi::all();
        return view('penjualans.create', compact('barangs', 'transaksis'));
    }

    public function store(Request $request)
    {
        $result = Penjualan::storePenjualan($request);
        return redirect()->route('penjualans.index')->with($result['status'], $result['message']);
    }

    public function edit($id)
    {
        $penjualan = Penjualan::getPenjualan($id);
        $barangs = Barang::all();
        $transaksis = Transaksi::all();
        return view('penjualans.edit', compact('penjualan', 'barangs', 'transaksis'));
    }

    public function update(Request $request, $id)
    {
        $result = Penjualan::updatePenjualan($request, $id);
        return redirect()->route('penjualans.index')->with($result['status'], $result['message']);
    }

    public function destroy($id)
    {
        $result = Penjualan::deletePenjualan($id);
        return redirect()->route('penjualans.index')->with($result['status'], $result['message']);
    }
}
