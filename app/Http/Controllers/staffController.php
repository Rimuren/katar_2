<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // Menampilkan semua staff
    public function index()
    {
        $staffs = Staff::with('jabatan')->get(); // Mengambil data staff beserta relasi jabatan
        return view('staffs.index', compact('staffs'));
    }

    // Menampilkan form tambah staff
    public function create()
    {
        $jabatans = Jabatan::all(); // Mengambil semua data jabatan untuk dropdown
        return view('staffs.create', compact('jabatans'));
    }

    // Menyimpan data staff baru
    public function store(Request $request)
    {
        $request->validate([
            'namaStaff' => 'required|string|max:255',
            'idJabatan' => 'required|exists:jabatan,id',
            'email' => 'required|email|unique:staff,email',
            'noTlp' => 'required|string|max:12|unique:staff,noTlp',
        ]);

        Staff::create($request->only(['namaStaff', 'idJabatan', 'email', 'noTlp']));

        return redirect()->route('staffs.index')->with('success', 'Staff berhasil ditambahkan.');
    }

    // Menampilkan detail staff berdasarkan ID
    public function show($id)
    {
        $staff = Staff::with('jabatan')->findOrFail($id);
        return view('staffs.show', compact('staff'));
    }

    // Menampilkan form edit staff
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        $jabatans = Jabatan::all(); // Mengambil data jabatan untuk dropdown
        return view('staffs.edit', compact('staff', 'jabatans'));
    }

    // Mengupdate data staff
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaStaff' => 'required|string|max:255',
            'idJabatan' => 'required|exists:jabatan,id',
            'email' => 'required|email|unique:staff,email,' . $id,
            'noTlp' => 'required|string|max:12|unique:staff,noTlp,' . $id,
        ]);

        $staff = Staff::findOrFail($id);
        $staff->update($request->only(['namaStaff', 'idJabatan', 'email', 'noTlp']));

        return redirect()->route('staffs.index')->with('success', 'Staff berhasil diperbarui.');
    }

    // Menghapus data staff
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('staffs.index')->with('success', 'Staff berhasil dihapus.');
    }
}
