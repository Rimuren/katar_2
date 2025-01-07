<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model ini
    protected $table = 'transaksi';
    public $timestamps = false;
    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'idPelanggan',
        'idStaff',
        'namaTransaksi',
        'tglTransaksi',
        'totalTransaksi',
        'tipeTransaksi',
    ];

    // Relasi dengan model Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'idPelanggan');
    }

    // Relasi dengan model Staff
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'idStaff');
    }
}
