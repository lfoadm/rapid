<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Admin\City;
use App\Models\Admin\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->paginate(6);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.products.create', compact('cities'));
    }
    
    public function store(StoreProductRequest $request): RedirectResponsE
    {
        // dd($request->all());
        Product::create($request->validated());
        return redirect(route('products.index'))->with('success', 'Rifa cadastrada com sucesso!');
    }

    public function edit(string $id)
    {
        $cities = City::all();
        if(!$product = Product::find($id)) {
            return redirect()->route('products.index')->with('message', 'Rifa não encontrado');
        };
        
        return view('admin.products.edit', compact('product', 'cities'));
    }

    public function update(string $id, UpdateProductRequest $request)
    {
        if(!$product = Product::find($id)) {
            return back()->with('message', 'Rifa não encontrada');
        };
        
        $product->update([
            'title' => $request->title,
            'city_id' => $request->city_id,
            'status' => $request->status,
        ]);

        return redirect(route('products.index'))->with('success', 'Rifa atualizada com sucesso!');
    }

    public function show(string $id)
    {
        if(!$product = Product::find($id)) {
            return redirect()->route('products.index')->with('message', 'Rifa não encontrada');
        };
        
        return view('admin.products.show', compact('product'));
    }

    public function destroy(string $id)
    {
        
        if(!$product = Product::find($id)) {
            return redirect()->route('products.index')->with('message', 'Rifa não encontrada');
        };

        $product->delete();
        return redirect()->route('products.index')->with('message', 'Rifa apagada com sucesso');
    }
}
