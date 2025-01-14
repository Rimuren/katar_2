<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Barang;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Menampilkan semua data shop
    public function index()
    {
        $shops = Shop::getAllShops();
        return view('shops.index', compact('shops'));
    }

    // Menampilkan form tambah shop
    public function create()
    {
        $barangs = Barang::all();
        return view('shops.create', compact('barangs'));
    }

    // Menyimpan data shop baru
    public function store(Request $request)
    {
        $result = Shop::storeShop($request);
        return redirect()->route('shops.index')->with($result['status'], $result['message']);
    }

    // Menampilkan form edit shop
    public function edit($id)
    {
        $shop = Shop::getShop($id);
        $barangs = Barang::all();
        return view('shops.edit', compact('shop', 'barangs'));
    }

    // Memperbarui data shop
    public function update(Request $request, $id)
    {
        $result = Shop::updateShop($request, $id);
        return redirect()->route('shops.index')->with($result['status'], $result['message']);
    }

    // Menghapus data shop
    public function destroy($id)
    {
        $result = Shop::deleteShop($id);
        return redirect()->route('shops.index')->with($result['status'], $result['message']);
    }
}
