<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;


class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    protected $fillable = ['namaJabatan'];
    public $timestamps = false;

    public function staff()
    {
        return $this->hasMany(staff::class, 'idJabatan');
    }

    public static function validateData($data)
    {
        return Validator::make($data, [
            'namaJabatan' => 'required|string|max:255|unique:jabatan,namaJabatan',
        ])->validate();
    }
}
