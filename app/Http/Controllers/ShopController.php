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
        return view('shop.index', compact('shops'));
    }

    public function create()
    {
        $barangs = Barang::all(); 
        return view('shop.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        // Validasi data menggunakan model
        $validated = Shop::validate($request->all());
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $data = $request->only(['namaBarang', 'idbarang']);

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('shops', 'public');
        }

        // Simpan data shop
        Shop::create($data);
        return redirect()->route('shop.index')->with('success', 'Shop created successfully');
    }

    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        $barangs = Barang::all();  
        return view('shop.edit', compact('shop', 'barangs'));
    }

    public function update(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);

        // Validasi data update menggunakan model
        $validated = Shop::validate($request->all(), true);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $data = $request->only(['namaBarang', 'idbarang']);

        // Upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($shop->image) {
                Storage::disk('public')->delete($shop->image);
            }

            $data['image'] = $request->file('image')->store('shops', 'public');
        }

        // Update data shop
        $shop->update($data);
        return redirect()->route('shop.index')->with('success', 'Shop updated successfully');
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
        return redirect()->route('shop.index')->with('success', 'Shop deleted successfully');
    }
}
