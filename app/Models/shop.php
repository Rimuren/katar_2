<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shop';

    protected $fillable = [
        'jumlahPoin', 'idbarang', 'image'
    ];

    public $timestamps = false;

    // Relasi dengan model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'idbarang');
    }

    // Fungsi validasi untuk Store dan Update
    public static function validate($data, $isUpdate = false)
    {
        // Set rules yang akan digunakan untuk validasi
        $rules = [
            'jumlahPoin' => 'required|string|max:255',
            'idbarang' => 'required|exists:barang,id',
            'image' => $isUpdate ? 'nullable|image|mimes:jpg,jpeg,png,gif' : 'required|image|mimes:jpg,jpeg,png,gif',
        ];

        return Validator::make($data, $rules);
    }
}
