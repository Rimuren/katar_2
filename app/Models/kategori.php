<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    public $timestamps = false;

    protected $fillable = [
        'namaKategori'
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public static function validateData($data)
    {
        return Validator::make($data, [
            'namaKategori' => 'required|string|max:255',
        ])->validate();
    }

    public static function createKategori($data)
    {
        self::validateData($data);
        return self::create($data);
    }

    public static function updateKategori($id, $data)
    {
        self::validateData($data);
        $kategori = self::findOrFail($id);
        $kategori->update($data);

        return $kategori;
    }
}