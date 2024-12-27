<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    public $timestamps = false;

    protected $fillable = [
        'namaKategori'
    ];

    // Relasi dengan model Barang
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    // Fungsi untuk validasi data kategori
    public static function validateData($data)
    {
        return Validator::make($data, [
            'namaKategori' => 'required|string|max:255',
        ])->validate();
    }

    // Fungsi untuk menyimpan kategori baru
    public static function createKategori($data)
    {
        // Validasi data
        self::validateData($data);

        // Menyimpan kategori
        return self::create($data);
    }

    // Fungsi untuk memperbarui kategori
    public static function updateKategori($id, $data)
    {
        // Validasi data
        self::validateData($data);

        // Mencari kategori dan memperbarui data
        $kategori = self::findOrFail($id);
        $kategori->update($data);

        return $kategori;
    }
}