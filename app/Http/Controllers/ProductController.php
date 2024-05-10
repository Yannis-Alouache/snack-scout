<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $category = $request->input('category');
        $min = $request->input('min');
        $max = $request->input('max');
        $query = Product::query();

        if (isset($category)) {
            $query->where('category', '=', $category);
        }
        if (isset($max)) {
            $query->where('price', '<=', $request->max);
            $query->where('price', '>=', 0);
        }
        if (isset($min)) {
            $query->where('price', '>=', $request->min);
        }
        $products = $query->get();

        $categories = Category::all();

        return view('products', [
            "products" => $products,
            "categories" => $categories
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
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp',
            'category' => 'required|string|max:255',
            'stock' => 'required|string',
            'discount' => 'required|string'
        ]);
        
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = floatval($request->price);
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
            dd($e->getMessage());
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('dashboard-products-list');
    }
}