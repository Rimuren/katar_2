<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\Staff;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        // Mengambil shift dengan relasi staff
        $shifts = Shift::with('staff')->get(); 
        return view('shifts.index', compact('shifts'));
    }

    // Form Shift
    public function create()
    {
        $staffs = Staff::all(); 
        return view('shifts.create', compact('staffs'));
    }

    // Simpan
    public function store(Request $request)
    {
        $request->validate([
            'idstaff' => 'required|exists:staff,id',
            'jamKerja' => 'required|date_format:H:i',
            'jamPulang' => 'required|date_format:H:i|after:jamKerja',
        ]);

        Shift::create($request->all());

        return redirect()->route('shifts.index')->with('success', 'Shift berhasil ditambahkan');
    }

    // Edit
    public function edit($id)
    {
        $shift = Shift::findOrFail($id); 
        $staffs = Staff::all(); 
        return view('shifts.edit', compact('shift', 'staffs'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'idstaff' => 'required|exists:staff,id',
            'jamKerja' => 'required|date_format:H:i',
            'jamPulang' => 'required|date_format:H:i|after:jamKerja',
        ]);

        $shift = Shift::findOrFail($id);
        $shift->update($request->all());

        return redirect()->route('shifts.index')->with('success', 'Shift berhasil diubah');
    }

    // Hapus
    public function destroy($id)
    {
        $shift = Shift::findOrFail($id);
        $shift->delete();

        return redirect()->route('shifts.index')->with('success', 'Shift berhasil dihapus');
    }
}
