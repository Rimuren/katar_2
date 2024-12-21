<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cashdrawer extends Model
{
    use HasFactory;

    protected $table = 'cash_drawer';

    public $timestamps = false;

    protected $fillable = [
        'idshift', 'jamBuka', 'jamTutup', 'saldoAwal', 'saldoAkhir'
    ];

    // Relasi ke model Shift
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'idshift');
    }
}

