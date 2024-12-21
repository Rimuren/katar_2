<?php

namespace App\Http\Controllers;

use App\Models\CashDrawer;
use App\Models\Shift;
use App\Models\Staff;
use Illuminate\Http\Request;

class CashDrawerController extends Controller
{
    // Menampilkan daftar cash drawer dengan relasi shift dan staff
    public function index()
    {
        // Ambil semua cash drawers dengan relasi shift dan staff
        $cashdrawers = CashDrawer::with('shift.staff')->get();

        return view('cashdrawers.index', compact('cashdrawers'));
    }

    // Menampilkan form untuk menambahkan cash drawer
    public function create()
    {
        // Ambil daftar staff untuk dropdown
        $staffs = Staff::all();
        return view('cashdrawers.create', compact('staffs'));
    }

    // Menyimpan cash drawer baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'idstaff' => 'required|exists:staff,id',
            'saldoAwal' => 'required|integer',
            'saldoAkhir' => 'nullable|integer',
        ]);

        // Ambil shift berdasarkan idstaff
        $shift = Shift::where('idstaff', $request->idstaff)->first();

        // Pastikan shift tersedia
        if (!$shift) {
            return redirect()->back()->withErrors(['idstaff' => 'Staff ini belum memiliki shift.']);
        }

        // Buat cash drawer baru
        CashDrawer::create([
            'idshift' => $shift->id,
            'jamBuka' => $shift->jamKerja,
            'jamTutup' => $shift->jamPulang,
            'saldoAwal' => $request->saldoAwal,
            'saldoAkhir' => $request->saldoAkhir,
        ]);

        return redirect()->route('cashdrawers.index')->with('success', 'Cash Drawer berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit cash drawer
    public function edit($id)
    {
        // Ambil cash drawer berdasarkan ID
        $cashdrawer = CashDrawer::findOrFail($id);
        $staffs = Staff::all(); // Daftar staff untuk form edit

        return view('cashdrawers.edit', compact('cashdrawer', 'staffs'));
    }

    // Mengupdate cash drawer yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'idstaff' => 'required|exists:staff,id',
            'saldoAwal' => 'required|integer',
            'saldoAkhir' => 'nullable|integer',
        ]);

        // Ambil shift berdasarkan idstaff
        $shift = Shift::where('idstaff', $request->idstaff)->first();

        // Pastikan shift tersedia
        if (!$shift) {
            return redirect()->back()->withErrors(['idstaff' => 'Staff ini belum memiliki shift.']);
        }

        // Update data cash drawer
        $cashdrawer = CashDrawer::findOrFail($id);
        $cashdrawer->update([
            'idshift' => $shift->id,
            'jamBuka' => $shift->jamKerja,
            'jamTutup' => $shift->jamPulang,
            'saldoAwal' => $request->saldoAwal,
            'saldoAkhir' => $request->saldoAkhir,
        ]);

        return redirect()->route('cashdrawers.index')->with('success', 'Cash Drawer berhasil diperbarui.');
    }

    // Menghapus cash drawer
    public function destroy($id)
    {
        // Cari cash drawer dan hapus
        $cashdrawer = CashDrawer::findOrFail($id);
        $cashdrawer->delete();

        return redirect()->route('cashdrawers.index')->with('success', 'Cash Drawer berhasil dihapus.');
    }
}
