<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penukaran;

class PenukaranController extends Controller
{
    public function index()
    {
        $penukaran = Penukaran::with(['transaksi', 'shop'])->get();
        return response()->json($penukaran);
    }

    public function show($id)
    {
        $penukaran = Penukaran::with(['transaksi', 'shop'])->find($id);

        if (!$penukaran) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($penukaran);
    }

    public function store(Request $request)
    {
        $request->validate([
            'idTransaksi' => 'required|exists:transaksis,idTransaksi',
            'idShop' => 'required|exists:shops,idShop',
            'pointUsed' => 'required|integer',
            'tglRedeem' => 'required|date',
        ]);

        $penukaran = Penukaran::create([
            'idTransaksi' => $request->idTransaksi,
            'idShop' => $request->idShop,
            'pointUsed' => $request->pointUsed,
            'tglRedeem' => $request->tglRedeem,
        ]);

        return response()->json($penukaran, 201);
    }

    public function update(Request $request, $id)
    {
        $penukaran = Penukaran::find($id);

        if (!$penukaran) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $request->validate([
            'idTransaksi' => 'exists:transaksis,idTransaksi',
            'idShop' => 'exists:shops,idShop',
            'pointUsed' => 'integer',
            'tglRedeem' => 'date',
        ]);

        $penukaran->update($request->all());

        return response()->json($penukaran);
    }

    public function destroy($id)
    {
        $penukaran = Penukaran::find($id);

        if (!$penukaran) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $penukaran->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
