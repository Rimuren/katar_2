<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shop';

    protected $fillable = [
        'jumlahPoin', 'idbarang', 'image'
    ];

    public $timestamps = false;

    // Relasi dengan model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'idbarang');
    }

    // Fungsi validasi untuk Store dan Update
    public static function validate($data, $isUpdate = false)
    {
        $rules = [
            'jumlahPoin' => 'required|string|max:255',
            'idbarang' => 'required|exists:barang,id',
            'image' => $isUpdate ? 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048' : 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ];

        return Validator::make($data, $rules);
    }

    // Fungsi untuk menyimpan data Shop (store)
    public static function storeShop(Request $request)
    {
        $validated = self::validate($request->all());

        if ($validated->fails()) {
            return [
                'status' => 'error',
                'message' => $validated->errors()->first()
            ];
        }

        $data = $request->only(['jumlahPoin', 'idbarang']);

        // Jika ada gambar yang diupload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('shops', 'public');
        }

        self::create($data);

        return [
            'status' => 'success',
            'message' => 'Shop berhasil ditambahkan'
        ];
    }

    // Fungsi untuk memperbarui data Shop (update)
    public static function updateShop(Request $request, $id)
    {
        $shop = self::findOrFail($id);
        $validated = self::validate($request->all(), true);

        if ($validated->fails()) {
            return [
                'status' => 'error',
                'message' => $validated->errors()->first()
            ];
        }

        $data = $request->only(['jumlahPoin', 'idbarang']);

        // Jika ada gambar yang diupload
        if ($request->hasFile('image')) {
            if ($shop->image) {
                Storage::disk('public')->delete($shop->image);
            }
            $data['image'] = $request->file('image')->store('shops', 'public');
        }

        $shop->update($data);

        return [
            'status' => 'success',
            'message' => 'Shop berhasil diperbarui'
        ];
    }

    // Fungsi untuk menghapus data Shop
    public static function deleteShop($id)
    {
        $shop = self::findOrFail($id);

        if ($shop->image) {
            Storage::disk('public')->delete($shop->image);
        }

        $shop->delete();

        return [
            'status' => 'success',
            'message' => 'Shop berhasil dihapus'
        ];
    }

    // Fungsi untuk mengambil semua data Shop
    public static function getAllShops()
    {
        return self::with('barang')->get();
    }

    // Fungsi untuk mengambil satu data Shop
    public static function getShop($id)
    {
        return self::with('barang')->findOrFail($id);
    }
}
