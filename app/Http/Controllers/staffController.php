<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::all();
        return view('staffs.index', compact('staffs'));
    }

    public function create()
    {
        $jabatans = Jabatan::all();
        return view('staffs.create', compact('jabatans'));
    }

    public function store(Request $request)
    {
        $result = Staff::storeStaff($request);
        return redirect()->route('staffs.index')->with($result['status'], $result['message']);
    }

    public function show($id)
    {
        $staff = Staff::getStaff($id);
        return view('staffs.show', compact('staff'));
    }

    public function edit($id)
    {
        $staffWithJabatans = Staff::getStaffWithJabatans($id);
        return view('staffs.edit', $staffWithJabatans);
    }

    public function update(Request $request, $id)
    {
        $result = Staff::updateStaff($request, $id);
        return redirect()->route('staffs.index')->with($result['status'], $result['message']);
    }

    public function destroy($id)
    {
        $result = Staff::deleteStaff($id);
        return redirect()->route('staffs.index')->with($result['status'], $result['message']);
    }
}
