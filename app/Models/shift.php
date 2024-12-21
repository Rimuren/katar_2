<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shift extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table = 'shift';

    protected $fillable = [
        'idstaff', 'jamKerja', 'jamPulang'
    ];

    public function staff()
    {
        return $this->belongsTo(staff::class, 'idstaff');
    }
}
