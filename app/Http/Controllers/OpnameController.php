<?php

namespace App\Http\Controllers;

use App\Models\Opname;
use App\Models\Barang;
use App\Models\Staff;
use Illuminate\Http\Request;

class OpnameController extends Controller
{
    public function index()
    {
        $opnames = Opname::with('barang', 'staff')->get();
        return view('opnames.index', compact('opnames'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $staffs = Staff::all();
        return view('opnames.create', compact('barangs', 'staffs'));
    }

    public function store(Request $request)
    {
        $result = Opname::createOpname($request->all());
        if (isset($result['errors'])) {
            return redirect()->back()->withErrors($result['errors'])->withInput();
        }

        return redirect()->route('opnames.index')->with('success', $result['success']);
    }

    public function edit($id)
    {
        $opname = Opname::findOrFail($id);
        $barangs = Barang::all();
        $staffs = Staff::all();
        return view('opnames.edit', compact('opname', 'barangs', 'staffs'));
    }

    public function update(Request $request, $id)
    {
        $result = Opname::updateOpname($id, $request->all());
        if (isset($result['errors'])) {
            return redirect()->back()->withErrors($result['errors'])->withInput();
        }

        return redirect()->route('opnames.index')->with('success', $result['success']);
    }

    public function destroy($id)
    {
        $opname = Opname::findOrFail($id);
        $opname->delete();

        return redirect()->route('opnames.index')->with('success', 'Opname berhasil dihapus');
    }
}