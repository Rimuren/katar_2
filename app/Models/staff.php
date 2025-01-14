<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;

    protected $table = 'staff';
    public $timestamps = false;

    protected $fillable = [
        'namaStaff', 'idJabatan', 'email', 'noTlp'
    ];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }

    public function shift()
    {
        return $this->hasMany(shift::class);
    }

    public function cashDrawer()
    {
        return $this->hasMany(cashdrawer::class);
    }

    public function opname()
    {
        return $this->hasMany(opname::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class, 'idJabatan');
    }
}
