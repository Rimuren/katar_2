<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function index()
    {
        $staffs = staff::all(); 
        return view('staffs.index', compact('staffs')); 
    }

    public function create()
    {
        return view('staffs.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaStaff' => 'required|string|max:255',
            'sebagai' => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email',
            'noTlp' => 'required|string|max:12|unique:staff,noTlp',
        ]);

        staff::create($request->all());

        return redirect()->route('staffs.index')->with('success', 'Staff berhasil ditambahkan.');
    }

    public function show($id)
    {
        $staff = staff::findOrFail($id); 
        return view('staffs.show', compact('staff'));
    }

    public function edit($id)
    {
        $staff = staff::findOrFail($id); 
        return view('staffs.edit', compact('staff')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaStaff' => 'required|string|max:255',
            'sebagai' => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email,' . $id,
            'noTlp' => 'required|string|max:12|unique:staff,noTlp,' . $id,
        ]);

        $staff = staff::findOrFail($id); 
        $staff->update($request->all());

        return redirect()->route('staffs.index')->with('success', 'Staff berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $staff = staff::findOrFail($id); 
        $staff->delete(); 

        return redirect()->route('staffs.index')->with('success', 'Staff berhasil dihapus.');
    }
}

