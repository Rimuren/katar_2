<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $fillable = [
        'idtransaksi', 'idbarang', 'quantity', 'totalHarga'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'idtransaksi');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'idbarang');
    }

    public static function getAllPenjualan()
    {
        return self::with(['barang', 'transaksi'])->get();
    }

    public static function getPenjualan($id)
    {
        return self::with(['barang', 'transaksi'])->findOrFail($id);
    }

    public static function storePenjualan(Request $request)
    {
        $validated = $request->validate([
            'idtransaksi' => 'required|exists:transaksi,id',
            'idbarang' => 'required|exists:barang,id',
            'quantity' => 'required|integer|min:1',
            'totalHarga' => 'required|numeric|min:0',
        ]);

        self::create($validated);

        return [
            'status' => 'success',
            'message' => 'Penjualan berhasil ditambahkan'
        ];
    }

    public static function updatePenjualan(Request $request, $id)
    {
        $penjualan = self::findOrFail($id);

        $validated = $request->validate([
            'idtransaksi' => 'required|exists:transaksi,id',
            'idbarang' => 'required|exists:barang,id',
            'quantity' => 'required|integer|min:1',
            'totalHarga' => 'required|numeric|min:0',
        ]);

        $penjualan->update($validated);

        return [
            'status' => 'success',
            'message' => 'Penjualan berhasil diperbarui'
        ];
    }

    public static function deletePenjualan($id)
    {
        $penjualan = self::findOrFail($id);
        $penjualan->delete();

        return [
            'status' => 'success',
            'message' => 'Penjualan berhasil dihapus'
        ];
    }
}
