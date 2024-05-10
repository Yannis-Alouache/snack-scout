<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
    
        $orders = Order::with('orderItems.product')
                       ->where('user_id', $userId)
                       ->get();

        return view('my-orders', ['orders' => $orders]);
    }

    public function markAsTreated($id)
    {
        $order = Order::find($id);
        $order->status = 'traité';
        $order->save();

        return redirect()->back();
    }
}
