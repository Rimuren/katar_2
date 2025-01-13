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
        return $result;
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
        return $result;
    }

    public function destroy($id)
    {
        $result = Opname::destroyOpname($id);
        return $result;
    }
}
