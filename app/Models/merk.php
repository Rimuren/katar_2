<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Merk extends Model
{
    use HasFactory;

    protected $table = 'merk';
    public $timestamps = false;

    protected $fillable = [
        'namaMerk'
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public static function validateData($data, $id = null)
    {
        return Validator::make($data, [
            'namaMerk' => 'required|string|max:255',
        ])->validate();
    }

    public static function createMerk($data)
    {
        self::validateData($data);
        return self::create($data);
    }

    public static function updateMerk($id, $data)
    {
        self::validateData($data, $id);
        $merk = self::findOrFail($id);
        $merk->update($data);

        return $merk;
    }
}