<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    public function index()
    {
        $merks = Merk::all();
        return view('merks.index', compact('merks'));
    }

    public function create()
    {
        return view('merks.create');
    }

    public function store(Request $request)
    {
        Merk::createMerk(['namaMerk' => $request->namaMerk,]);
        return redirect()->route('merks.index')->with('success', 'Merk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $merk = Merk::findOrFail($id);
        return view('merks.edit', compact('merk'));
    }

    public function update(Request $request, $id)
    {
        Merk::updateMerk($id, ['namaMerk' => $request->namaMerk,]);
        return redirect()->route('merks.index')->with('success', 'Merk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $merk = Merk::findOrFail($id);
        $merk->delete();
        return redirect()->route('merks.index')->with('success', 'Merk berhasil dihapus.');
    }
}