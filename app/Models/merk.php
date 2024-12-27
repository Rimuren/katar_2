<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class merk extends Model
{
    use HasFactory;

    protected $table = 'merk';
    public $timestamps = false;

    protected $fillable = [
        'namaMerk'
    ];

    // Relasi dengan Barang
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    // Validasi data merk
    public static function validateData($data, $id = null)
    {
        return Validator::make($data, [
            'namaMerk' => 'required|string|max:255',
        ])->validate();
    }

    // Fungsi untuk menyimpan merk baru
    public static function createMerk($data)
    {
        // Validasi data
        self::validateData($data);

        // Menyimpan merk
        return self::create($data);
    }

    // Fungsi untuk memperbarui merk
    public static function updateMerk($id, $data)
    {
        // Validasi data
        self::validateData($data, $id);

        // Mencari merk dan memperbarui data
        $merk = self::findOrFail($id);
        $merk->update($data);

        return $merk;
    }
}