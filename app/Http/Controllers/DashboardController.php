<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function productsList()
    {
        $products = Product::all();
        return view('dashboard-products-list', [
            "products" => $products
        ]);
    }

    public function modifyProduct()
    {
        return view('dashboard-product-modify');
    }

    public function addProduct()
    {
        $categories = Category::all();
        
        return view('dashboard-product-add', ['categories' => $categories]);
    }

    public function ordersList()
    {
        return view('dashboard-orders');
    }
}
