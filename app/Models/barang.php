<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class barang extends Model
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

    // Fungsi untuk validasi data
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

    // Fungsi untuk menyimpan barang
    public static function createBarang($data)
    {
        // Validasi data
        self::validateData($data);

        // Menyimpan barang
        return self::create($data);
    }

    // Fungsi untuk memperbarui barang
    public static function updateBarang($id, $data)
    {
        // Validasi data
        self::validateData($data);

        // Mencari barang dan memperbarui data
        $barang = self::findOrFail($id);
        $barang->update($data);

        return $barang;
    }
}