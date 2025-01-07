<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    public $timestamps = false;

    protected $fillable = [
        'idmerk', 'idkategori', 'namaBarang', 'stok', 'hargaBeli', 'hargaJual'
    ];

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'idmerk');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'idkategori');
    }

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }

    public function opname()
    {
        return $this->hasMany(Opname::class);
    }

    public static function validateData($data)
    {
        return Validator::make($data, [
            'namaBarang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'hargaBeli' => 'required|numeric|min:0',
            'hargaJual' => 'required|numeric|min:0',
            'idkategori' => 'required|exists:kategori,id',
            'idmerk' => 'required|exists:merk,id',
        ])->validate();
    }

    public static function createBarang($data)
    {
        self::validateData($data);
        return self::create($data);
    }

    public static function updateBarang($id, $data)
    {
        self::validateData($data);
        $barang = self::findOrFail($id);
        $barang->update($data);

        return $barang;
    }
}