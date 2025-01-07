<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';

    protected $fillable = [
        'namaSupplier', 'noTlp', 'email'
    ];

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }

    public static function createSupplier($data)
    {
        $validator = Validator::make($data, [
            'namaSupplier' => 'required|string|max:255',
            'noTlp' => 'required|string|max:15',
            'email' => 'required|email|unique:supplier,email',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $supplier = self::create($data);

        return ['success' => 'Supplier berhasil ditambahkan.', 'data' => $supplier];
    }

    public static function updateSupplier($id, $data)
    {
        $validator = Validator::make($data, [
            'namaSupplier' => 'required|string|max:255',
            'noTlp' => 'required|string|max:15',
            'email' => 'required|email|unique:supplier,email,' . $id,
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $supplier = self::findOrFail($id);
        $supplier->update($data);

        return ['success' => 'Supplier berhasil diperbarui.', 'data' => $supplier];
    }
}