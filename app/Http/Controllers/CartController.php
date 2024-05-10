<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view("cart");
    }

    public function addToCart(Request $request, $id, $quantity)
    { 
        $product = Product::find($id)->toArray();

        if ($quantity > $product['stock']) {
            return redirect()->back()->with('error', 'Quantité de produit insuffisante !');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += intval($quantity);
        } else {
            $cart[$id] = $product;
            $cart[$id]['quantity'] = $quantity;  // Initialize quantity
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function increaseQuantity($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Quantité augmentée avec succès!');
    }

    public function decreaseQuantity($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            }
            else {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Quantité diminuée avec succès!');
    }


}


