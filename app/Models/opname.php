<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class opname extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'opname';

    protected $fillable = [
        'idbarang', 'idstaff', 'tglOpname', 'stokFisik', 'stokSistem', 'selisih'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'idbarang');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'idstaff');
    }

    // Fungsi untuk validasi dan simpan data opname
    public static function createOpname($data)
    {
        $validator = Validator::make($data, [
            'idbarang' => 'required|exists:barang,id',
            'idstaff' => 'required|exists:staff,id',
            'tglOpname' => 'required|date',
            'stokFisik' => 'required|numeric',
            'stokSistem' => 'nullable|numeric',
            'selisih' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        // Mendapatkan stok sistem dari barang
        $barang = Barang::find($data['idbarang']);
        $stokSistem = $barang->stok;

        // Menghitung selisih
        $selisih = $data['stokFisik'] - $stokSistem;

        // Menyimpan data opname
        $opname = self::create([
            'idbarang' => $data['idbarang'],
            'idstaff' => $data['idstaff'],
            'tglOpname' => $data['tglOpname'],
            'stokFisik' => $data['stokFisik'],
            'stokSistem' => $stokSistem,
            'selisih' => $selisih,
        ]);

        return ['success' => 'Opname berhasil disimpan.', 'data' => $opname];
    }

    // Fungsi untuk update opname
    public static function updateOpname($id, $data)
    {
        $validator = Validator::make($data, [
            'idbarang' => 'required|exists:barang,id',
            'idstaff' => 'required|exists:staff,id',
            'tglOpname' => 'required|date',
            'stokFisik' => 'required|numeric',
            'stokSistem' => 'nullable|numeric',
            'selisih' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        // Mendapatkan stok sistem dari barang
        $barang = Barang::find($data['idbarang']);
        $stokSistem = $barang->stok;

        // Menghitung selisih
        $selisih = $data['stokFisik'] - $stokSistem;

        $opname = self::findOrFail($id);
        $opname->update([
            'idbarang' => $data['idbarang'],
            'idstaff' => $data['idstaff'],
            'tglOpname' => $data['tglOpname'],
            'stokFisik' => $data['stokFisik'],
            'stokSistem' => $stokSistem,
            'selisih' => $selisih,
        ]);

        return ['success' => 'Opname berhasil diperbarui.', 'data' => $opname];
    }
}