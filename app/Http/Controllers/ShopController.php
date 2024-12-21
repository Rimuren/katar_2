<?php

namespace App\Http\Controllers;

use App\Models\shop;
use App\Models\barang;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = shop::with('barang')->get();
        return view('shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = barang::all();
        return view('shops.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idbarang' => 'required|exists:barang,id',
            'poinRequired' => 'required|numeric|min:0',
        ]);

        shop::create($request->all());

        return redirect()->route('shops.index')->with('success', 'Shop item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(shop $shop)
    {
        return view('shops.show', compact('shops'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(shop $shop)
    {
        $barangs = barang::all();
        return view('shops.edit', compact('shops', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, shop $shop)
    {
        $request->validate([
            'idbarang' => 'required|exists:barang,id',
            'poinRequired' => 'required|numeric|min:0',
        ]);

        $shop->update($request->all());

        return redirect()->route('shops.index')->with('success', 'Shop item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(shop $shop)
    {
        $shop->delete();

        return redirect()->route('shops.index')->with('success', 'Shop item deleted successfully.');
    }
}
