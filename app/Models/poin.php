<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    use HasFactory;

    protected $table = 'poin'; 

    protected $fillable = [
        'min_harga', 'max_harga', 'poin', 'idbarang'
    ];

    // Relasi dengan model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'idbarang');
    }

    // Relasi dengan model Penukaran
    public function penukaran()
    {
        return $this->hasMany(Penukaran::class);
    }
}
