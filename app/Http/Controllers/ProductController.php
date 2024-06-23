<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('product.index', ["products" => $products]);
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);
        $newProduct = Product::create($data);
        return redirect(route('product.index'));
    }

    public function edit(Product $product){
        return view('product.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product '. $product->name . ' successfully updated.');
    }

    public function destroy(Product $product) {
        $name = $product->name;
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product '. $name . ' successfully deleted.');
    }
}
