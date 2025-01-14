<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('suppliers.index', ['suppliers' => Supplier::getAllSuppliers()]);
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $result = Supplier::createSupplier($request->all());
        return $this->redirectWithResult($result, 'suppliers.index');
    }

    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $result = Supplier::updateSupplier($supplier->id, $request->all());
        return $this->redirectWithResult($result, 'suppliers.index');
    }

    public function destroy(Supplier $supplier)
    {
        $result = Supplier::deleteSupplier($supplier->id);
        return $this->redirectWithResult($result, 'suppliers.index');
    }

    private function redirectWithResult($result, $route)
    {
        return redirect()->route($route)->with($result['status'], $result['message']);
    }
}
