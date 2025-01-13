<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penukaran extends Model
{
    use HasFactory;

    protected $table = 'penukaran'; 

    protected $fillable = [
        'idtransaksi', 'idpelanggan', 'idshop', 'pointUsed', 'tglReedem'
    ];

    // Relasi dengan model Shop
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'idshop');
    }

    // Relasi dengan model Poin
    public function poin()
    {
        return $this->belongsTo(Poin::class, 'idpoin');
    }

    // Relasi dengan model Transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'idtransaksi');
    }
}
