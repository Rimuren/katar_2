<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Pelanggan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'pelanggan';

    protected $fillable = [
        'namaPelanggan', 'noTlp', 'email',
    ];
    public static function createPelanggan($data)
    {
        $validator = Validator::make($data, [
            'namaPelanggan' => 'required|string|max:255',
            'noTlp' => 'numeric|unique:pelanggan,noTlp',
            'email' => 'string|email|max:255|unique:pelanggan,email',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $pelanggan = self::create([
            'namaPelanggan' => $data['namaPelanggan'],
            'noTlp' => $data['noTlp'],
            'email' => $data['email'],
        ]);

        return ['success' => 'Pelanggan berhasil disimpan.', 'data' => $pelanggan];
    }

    public static function updatePelanggan($id, $data)
    {
        $validator = Validator::make($data, [
            'namaPelanggan' => 'string|max:255',
            'noTlp' => 'numeric|unique:pelanggan,noTlp,',
            'email' => 'string|email|max:255|unique:pelanggan,email,',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $pelanggan = self::findOrFail($id);
        $pelanggan->update([
            'namaPelanggan' => $data['namaPelanggan'],
            'noTlp' => $data['noTlp'],
            'email' => $data['email'],
        ]);

        return ['success' => 'Pelanggan berhasil diperbarui.', 'data' => $pelanggan];
    }
}
