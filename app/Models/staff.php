<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class staff extends Model
{
    use HasFactory;

    protected $table = 'staff';
    public $timestamps = false;

    protected $fillable = [
        'namaStaff', 'sebagai', 'email', 'noTlp'
    ];

    // Relasi
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

    // Logika untuk mendapatkan semua staff
    public static function getAllStaff()
    {
        return self::all();
    }

    // Logika untuk menyimpan staff baru
    public static function storeStaff($request)
    {
        $validator = Validator::make($request->all(), [
            'namaStaff' => 'required|string|max:255',
            'sebagai' => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email',
            'noTlp' => 'required|string|max:12|unique:staff,noTlp',
        ]);

        if ($validator->fails()) {
            return [
                'status' => 'error',
                'message' => $validator->errors()->first()
            ];
        }

        self::create($request->all());
        return [
            'status' => 'success',
            'message' => 'Staff berhasil ditambahkan.'
        ];
    }

    // Logika untuk mendapatkan staff berdasarkan ID
    public static function getStaff($id)
    {
        return self::findOrFail($id);
    }

    // Logika untuk memperbarui staff
    public static function updateStaff($request, $id)
    {
        $staff = self::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'namaStaff' => 'required|string|max:255',
            'sebagai' => 'required|string|max:255',
            'email' => 'required|email|unique:staff,email,' . $id,
            'noTlp' => 'required|string|max:12|unique:staff,noTlp,' . $id,
        ]);

        if ($validator->fails()) {
            return [
                'status' => 'error',
                'message' => $validator->errors()->first()
            ];
        }

        $staff->update($request->all());
        return [
            'status' => 'success',
            'message' => 'Staff berhasil diperbarui.'
        ];
    }

    // Logika untuk menghapus staff
    public static function deleteStaff($id)
    {
        $staff = self::findOrFail($id);
        $staff->delete();

        return [
            'status' => 'success',
            'message' => 'Staff berhasil dihapus.'
        ];
    }
}
