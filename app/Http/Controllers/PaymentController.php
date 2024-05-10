<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;

class PaymentController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'card-number' => 'required|numeric|digits:16', // Vérifie que c'est un nombre de 16 chiffres
            'date' => [
                'required',
                'regex:/^(0[1-9]|1[0-2])\/[0-9]{4}$/' // Vérifie le format "MM/YYYY"
            ],
            'cvv' => 'required|numeric|digits:3', // Vérifie que c'est un nombre à 3 chiffres
            'name' => 'required|string|max:255', // Vérifie que c'est une chaîne et ne dépasse pas 255 caractères
        ]);



        $total = 0;
        // Création de la commande
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->save();

        // Ajouter chaque article du panier comme un article de commande
        foreach (session('cart') as $productId => $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $productId;
            $orderItem->quantity = $item['quantity'];
            $orderItem->save();

            $order->reduceStock($productId, $item['quantity']);

            $item["price"] = $item["price"] * (100 - $item["discount"]) / 100;
            $total += $item['quantity'] * $item['price'];
        }

        if (session()->has('reduction')) {
            $reductionPercentage = session('reduction');
            $reductionAmount = ($total * $reductionPercentage) / 100;
            $total -= $reductionAmount;
        }

        $order->total = $total;
        $order->save();

        session()->forget('cart');

        return redirect()->back()->with('success', 'Paiement réussi ! Merci pour votre achat.');
    }

}
