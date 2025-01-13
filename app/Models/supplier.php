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

    public static function getAllSuppliers()
    {
        return self::all();
    }

    public static function createSupplier($data)
    {
        $validator = self::validateSupplier($data);

        if ($validator->fails()) {
            return self::errorResult($validator->errors());
        }

        self::create($validator->validated());
        return self::successResult('Supplier berhasil ditambahkan.');
    }

    public static function updateSupplier($id, $data)
    {
        $validator = self::validateSupplier($data, $id);

        if ($validator->fails()) {
            return self::errorResult($validator->errors());
        }

        $supplier = self::findOrFail($id);
        $supplier->update($validator->validated());
        return self::successResult('Supplier berhasil diperbarui.');
    }

    public static function deleteSupplier($id)
    {
        $supplier = self::findOrFail($id);
        $supplier->delete();
        return self::successResult('Supplier berhasil dihapus.');
    }

    private static function validateSupplier($data, $id = null)
    {
        $rules = [
            'namaSupplier' => 'required|string|max:255',
            'noTlp' => 'required|string|max:15',
            'email' => 'required|email|unique:supplier,email' . ($id ? ',' . $id : ''),
        ];

        return Validator::make($data, $rules);
    }

    private static function successResult($message)
    {
        return ['status' => 'success', 'message' => $message];
    }

    private static function errorResult($errors)
    {
        return ['status' => 'error', 'message' => $errors];
    }

    public static function createApiSupplier($data)
    {
        $validator = self::validateSupplier($data);
        if ($validator->fails()) {
            return ['status' => 'error', 'message' => $validator->errors()];
        }

        return self::create($validator->validated());
    }

    public static function updateApiSupplier($id, $data)
    {
        $validator = self::validateSupplier($data, $id);
        if ($validator->fails()) {
            return ['status' => 'error', 'message' => $validator->errors()];
        }

        $supplier = self::findOrFail($id);
        $supplier->update($validator->validated());
        return $supplier;
    }

    public static function deleteApiSupplier($id)
    {
        $supplier = self::findOrFail($id);
        $supplier->delete();
        return ['status' => 'success', 'message' => 'Supplier berhasil dihapus'];
    }
}

