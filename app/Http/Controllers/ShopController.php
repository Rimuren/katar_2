<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::with('barang')->get(); 
        return view('shops.index', compact('shops'));
    }

    public function create()
    {
        $barangs = Barang::all(); 
        $shops = Shop::with('barang')->get();
        return view('shops.create', compact('barangs', 'shops'));
    }

    public function store(Request $request)
    {
        // Validasi data menggunakan model
        $validated = Shop::validate($request->all());
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        // Ambil data yang dibutuhkan
        $data = $request->only(['jumlahPoin', 'idbarang']);

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('shops', 'public');
        }

        // Simpan data shop ke database
        Shop::create($data);
        return redirect()->route('shops.index')->with('success', 'Shop created successfully');
    }

    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        $barangs = Barang::all();  
        return view('shops.edit', compact('shop', 'barangs'));
    }

    public function update(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);

        // Validasi data update
        $validated = Shop::validate($request->all(), true);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        // Ambil data yang dibutuhkan
        $data = $request->only(['jumlahPoin', 'idbarang']);

        //  Jika ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($shop->image) {
                Storage::disk('public')->delete($shop->image);
            }

            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('shops', 'public');
        } else {
            $data['image'] = null; 
        }

        // Update data shop
        $shop->update($data);
        return redirect()->route('shops.index')->with('success', 'Shop updated successfully');
    }

    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);

        // Hapus gambar jika ada
        if ($shop->image) {
            Storage::disk('public')->delete($shop->image);
        }

        // Hapus shop
        $shop->delete();
        return redirect()->route('shops.index')->with('success', 'Shop deleted successfully');
    }
}
