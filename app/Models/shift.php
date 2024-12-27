<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class shift extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'shift';

    protected $fillable = [
        'idstaff', 'jamKerja', 'jamPulang'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'idstaff');
    }

    // Logika untuk mendapatkan semua shift
    public static function getAllShifts()
    {
        return self::with('staff')->get();
    }

    // Logika untuk menyimpan shift baru
    public static function storeShift($request)
    {
        $validator = Validator::make($request->all(), [
            'idstaff' => 'required|exists:staff,id',
            'jamKerja' => 'required|date_format:H:i',
            'jamPulang' => 'required|date_format:H:i|after:jamKerja',
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
            'message' => 'Shift berhasil ditambahkan'
        ];
    }

    // Logika untuk mendapatkan shift berdasarkan ID
    public static function getShift($id)
    {
        return self::findOrFail($id);
    }

    // Logika untuk memperbarui shift
    public static function updateShift($request, $id)
    {
        $shift = self::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'idstaff' => 'required|exists:staff,id',
            'jamKerja' => 'required|date_format:H:i',
            'jamPulang' => 'required|date_format:H:i|after:jamKerja',
        ]);

        if ($validator->fails()) {
            return [
                'status' => 'error',
                'message' => $validator->errors()->first()
            ];
        }

        $shift->update($request->all());
        return [
            'status' => 'success',
            'message' => 'Shift berhasil diubah'
        ];
    }

    // Logika untuk menghapus shift
    public static function deleteShift($id)
    {
        $shift = self::findOrFail($id);
        $shift->delete();

        return [
            'status' => 'success',
            'message' => 'Shift berhasil dihapus'
        ];
    }
}
