<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Cashdrawer extends Model
{
    use HasFactory;
    protected $table = 'cash_drawer';
    public $timestamps = false;
    protected $fillable = ['idshift', 'jamBuka', 'jamTutup', 'saldoAwal', 'saldoAkhir'];

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'idshift');
    }

    public static function createCashDrawer($data)
    {
        $validator = Validator::make($data, [
            'idstaff' => 'required|exists:staff,id',
            'saldoAwal' => 'required|integer',
            'saldoAkhir' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $shift = Shift::where('idstaff', $data['idstaff'])->first();

        if (!$shift) {
            return ['errors' => ['idstaff' => 'Staff ini belum memiliki shift.']];
        }

        $cashdrawer = self::create([
            'idshift' => $shift->id,
            'jamBuka' => $shift->jamKerja,
            'jamTutup' => $shift->jamPulang,
            'saldoAwal' => $data['saldoAwal'],
            'saldoAkhir' => $data['saldoAkhir'],
        ]);

        return ['success' => 'Cash Drawer berhasil ditambahkan.', 'data' => $cashdrawer];
    }

    public static function updateCashDrawer($id, $data)
    {
        $validator = Validator::make($data, [
            'idstaff' => 'required|exists:staff,id',
            'saldoAwal' => 'required|integer',
            'saldoAkhir' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $shift = Shift::where('idstaff', $data['idstaff'])->first();

        if (!$shift) {
            return ['errors' => ['idstaff' => 'Staff ini belum memiliki shift.']];
        }

        $cashdrawer = self::findOrFail($id);
        $cashdrawer->update([
            'idshift' => $shift->id,
            'jamBuka' => $shift->jamKerja,
            'jamTutup' => $shift->jamPulang,
            'saldoAwal' => $data['saldoAwal'],
            'saldoAkhir' => $data['saldoAkhir'],
        ]);

        return ['success' => 'Cash Drawer berhasil diperbarui.', 'data' => $cashdrawer];
    }
}
