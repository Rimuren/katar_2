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

    public static function getAllStaff()
    {
        return self::all();
    }

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

    public static function getStaff($id)
    {
        return self::findOrFail($id);
    }

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

    public static function deleteStaff($id)
    {
        $staff = self::findOrFail($id);
        $staff->delete();

        return [
            'status' => 'success',
            'message' => 'Staff berhasil dihapus.'
        ];
    }

    public function jabatan()
    {
        return $this->belongsTo(jabatan::class, 'idJabatan');
    }
}
