<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Opname extends Model
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

    private static function validateData($data)
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

        return [];
    }

    public static function createOpname($data)
    {
        $validationResult = self::validateData($data);
        if (!empty($validationResult)) {
            return $validationResult;
        }

        $barang = Barang::find($data['idbarang']);
        $stokSistem = $barang->stok;

        $selisih = $data['stokFisik'] - $stokSistem;

        $opname = self::create([
            'idbarang' => $data['idbarang'],
            'idstaff' => $data['idstaff'],
            'tglOpname' => $data['tglOpname'],
            'stokFisik' => $data['stokFisik'],
            'stokSistem' => $stokSistem,
            'selisih' => $selisih,
        ]);

        return redirect()->route('opnames.index')->with('success', 'Opname berhasil disimpan.')->with('data', $opname);

    }

    public static function updateOpname($id, $data)
    {
        $validationResult = self::validateData($data);
        if (!empty($validationResult)) {
            return $validationResult;
        }

        $barang = Barang::find($data['idbarang']);
        $stokSistem = $barang->stok;

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

        return redirect()->route('opnames.index')->with('success', 'Opname berhasil diperbarui.')->with('data', $opname);
    }

    public static function destroyOpname($id)
    {
        $opname = self::findOrFail($id);
        $opname->delete();

        return redirect()->route('opnames.index')->with('success', 'Opname berhasil dihapus.');
    }
}
