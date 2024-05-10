<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::where('discount', '>', 0)
                   ->limit(6)
                   ->get();

        return view('main',
            [
                "categories" => $categories,
                "products" => $products
            ]
        );
    }
}
