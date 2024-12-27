<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\Staff;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::getAllShifts();
        return view('shifts.index', compact('shifts'));
    }

    public function create()
    {
        $staffs = Staff::all();
        return view('shifts.create', compact('staffs'));
    }

    public function store(Request $request)
    {
        $result = Shift::storeShift($request);
        return redirect()->route('shifts.index')->with($result['status'], $result['message']);
    }

    public function edit($id)
    {
        $shift = Shift::getShift($id);
        $staffs = Staff::all();
        return view('shifts.edit', compact('shift', 'staffs'));
    }

    public function update(Request $request, $id)
    {
        $result = Shift::updateShift($request, $id);
        return redirect()->route('shifts.index')->with($result['status'], $result['message']);
    }

    public function destroy($id)
    {
        $result = Shift::deleteShift($id);
        return redirect()->route('shifts.index')->with($result['status'], $result['message']);
    }
}
