<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Staff;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['pelanggan', 'staff'])->get();
        return view('transaksis.index', compact('transaksis'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $staffs = Staff::all();
        return view('transaksis.create', compact('pelanggans', 'staffs'));
    }

    public function store(Request $request)
    {
        return Transaksi::createTransaksi($request->all());
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pelanggans = Pelanggan::all();
        $staffs = Staff::all();
        return view('transaksis.edit', compact('transaksi', 'pelanggans', 'staffs'));
    }

    public function update(Request $request, $id)
    {
        return Transaksi::updateTransaksi($id, $request->all());
    }

    public function destroy($id)
    {
        return Transaksi::destroyTransaksi($id);
    }
}
