<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();

        return view('products', [
            "products" => $products
        ]);
    
    }

    public function details($id): View {
        $product = Product::find($id);

        return view('product-details', [
            "product" => $product
        ]);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'category' => 'required|string|max:255',
            'stock' => 'required|string',
            'discount' => 'required|string'
        ]);

    
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = intval($request->price);
            $product->category = $request->category;
            $product->stock = intval($request->stock);
            $product->discount = intval($request->discount);
    
            if ($request->hasFile('image')) {
                $filename = $request->image->getClientOriginalName();
                $request->image->storeAs('uploads', $filename, 'public');
                $product->image = $filename;
            }
    
            $product->save();
    
            return redirect()->route('dashboard-products-list')->with('success', 'Produit ajouté avec succès.');
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}