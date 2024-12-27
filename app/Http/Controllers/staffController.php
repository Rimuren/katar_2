<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = staff::getAllStaff();
        return view('staffs.index', compact('staffs'));
    }

    public function create()
    {
        return view('staffs.create');
    }

    public function store(Request $request)
    {
        $result = staff::storeStaff($request);
        return redirect()->route('staffs.index')->with($result['status'], $result['message']);
    }

    public function show($id)
    {
        $staff = staff::getStaff($id);
        return view('staffs.show', compact('staff'));
    }

    public function edit($id)
    {
        $staff = staff::getStaff($id);
        return view('staffs.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $result = staff::updateStaff($request, $id);
        return redirect()->route('staffs.index')->with($result['status'], $result['message']);
    }

    public function destroy($id)
    {
        $result = staff::deleteStaff($id);
        return redirect()->route('staffs.index')->with($result['status'], $result['message']);
    }
}
