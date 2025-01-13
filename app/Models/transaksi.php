<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    public $timestamps = false;
    
    protected $fillable = [
        'idPelanggan',
        'idStaff',
        'namaTransaksi',
        'tglTransaksi',
        'totalTransaksi',
        'tipeTransaksi',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'idPelanggan');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'idStaff');
    }

    private static function validateData($data)
    {
        $validator = Validator::make($data, [
            'idPelanggan' => 'required|exists:pelanggan,id',
            'idStaff' => 'required|exists:staff,id',
            'namaTransaksi' => 'required|string|max:255',
            'tglTransaksi' => 'required|date',
            'totalTransaksi' => 'required|integer|min:0',
            'tipeTransaksi' => 'required|in:beli,tukar',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        return [];
    }

    public static function createTransaksi($data)
    {
        $validationResult = self::validateData($data);
        if (!empty($validationResult)) {
            return $validationResult;
        }

        self::create($data);
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil Ditambahkan!');
    }

    public static function updateTransaksi($id, $data)
    {
        $validationResult = self::validateData($data);
        if (!empty($validationResult)) {
            return $validationResult;
        }

        $transaksi = self::findOrFail($id);
        $transaksi->update($data);
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil Perbarui!');
    }

    public static function destroyTransaksi($id)
    {
        $transaksi = self::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
