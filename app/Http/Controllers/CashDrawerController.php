<?php

namespace App\Http\Controllers;

use App\Models\CashDrawer;
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
        CashDrawer::createCashDrawer($request->all());
        return redirect()->route('cashdrawers.index')->with('success', 'CashDrawer Berhasil dibuat');
    }

    public function edit($id)
    {
        $cashdrawer = CashDrawer::findOrFail($id);
        $staffs = Staff::all();
        return view('cashdrawers.edit', compact('cashdrawer', 'staffs'));
    }

    public function update(Request $request, $id)
    {
        CashDrawer::updateCashDrawer($id, $request->all());
        return redirect()->route('cashdrawers.index')->with('success', 'CashDrawer berhasil diperbarui');
    }

    public function destroy($id)
    {
        $cashdrawer = CashDrawer::findOrFail($id);
        $cashdrawer->delete();
        return redirect()->route('cashdrawers.index')->with('success', 'Cash Drawer berhasil dihapus.');
    }
}
