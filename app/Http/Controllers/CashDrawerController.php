<?php

namespace App\Http\Controllers;

use App\Models\CashDrawer;
use App\Models\Shift;
use App\Models\Staff;
use Illuminate\Http\Request;

class CashDrawerController extends Controller
{
    public function index()
    {
        $cashdrawers = CashDrawer::with('shift.staff')->get();

        return view('cashdrawers.index', compact('cashdrawers'));
    }
    
    public function create()
    {
        $staffs = Staff::all();
        return view('cashdrawers.create', compact('staffs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idstaff' => 'required|exists:staff,id',
            'saldoAwal' => 'required|integer',
            'saldoAkhir' => 'nullable|integer',
        ]);

        $shift = Shift::where('idstaff', $request->idstaff)->first();

        if (!$shift) {
            return redirect()->back()->withErrors(['idstaff' => 'Staff ini belum memiliki shift.']);
        }

        CashDrawer::create([
            'idshift' => $shift->id,
            'jamBuka' => $shift->jamKerja,
            'jamTutup' => $shift->jamPulang,
            'saldoAwal' => $request->saldoAwal,
            'saldoAkhir' => $request->saldoAkhir,
        ]);

        return redirect()->route('cashdrawers.index')->with('success', 'Cash Drawer berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $cashdrawer = CashDrawer::findOrFail($id);
        $staffs = Staff::all();

        return view('cashdrawers.edit', compact('cashdrawer', 'staffs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idstaff' => 'required|exists:staff,id',
            'saldoAwal' => 'required|integer',
            'saldoAkhir' => 'nullable|integer',
        ]);

        $shift = Shift::where('idstaff', $request->idstaff)->first();

        if (!$shift) {
            return redirect()->back()->withErrors(['idstaff' => 'Staff ini belum memiliki shift.']);
        }

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

    public function destroy($id)
    {
        $cashdrawer = CashDrawer::findOrFail($id);
        $cashdrawer->delete();

        return redirect()->route('cashdrawers.index')->with('success', 'Cash Drawer berhasil dihapus.');
    }
}
