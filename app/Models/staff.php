<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';
    public $timestamps = false;

    protected $fillable = [
        'namaStaff', 'idJabatan', 'email', 'noTlp'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function shift()
    {
        return $this->hasMany(Shift::class);
    }

    public function cashDrawer()
    {
        return $this->hasMany(Cashdrawer::class);
    }

    public function opname()
    {
        return $this->hasMany(Opname::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class,'idjabatan');
    }

    public static function getJabatans()
    {
        return Jabatan::all();
    }

    public static function getStaffWithJabatans($id)
    {
        $staff = self::findOrFail($id);
        $jabatans = Jabatan::all();
        return compact('staff', 'jabatans');
    }

    public static function storeStaff($request)
    {
        $validator = Validator::make($request->all(), [
            'namaStaff' => 'required|string|max:255',
            'idJabatan' => 'required|exists:jabatan,id',
            'email' => 'required|email|unique:staff,email',
            'noTlp' => 'required|string|max:12|unique:staff,noTlp',
        ]);

        if ($validator->fails()) {
            return [
                'status' => 'error',
                'message' => $validator->errors()->first()
            ];
        }

        $staff = self::create($request->all());
        return [
            'status' => 'success',
            'message' => 'Staff berhasil ditambahkan.',
            'data' => $staff
        ];
    }

    public static function getStaff($id)
    {
        return self::findOrFail($id);
    }

    public static function updateStaff($request, $id)
    {
        $staff = self::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'namaStaff' => 'required|string|max:255',
            'idJabatan' => 'required|exists:jabatan,id',
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
            'message' => 'Staff berhasil diperbarui.',
            'data' => $staff
        ];
    }

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
