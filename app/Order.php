<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function reduceStock($productId, $quantity)
    {
        $product = Product::find($productId);
        if (!$product) {
            return false; // Le produit n'existe pas
        }

        $product->stock -= $quantity;
        $product->save();

        return true;
    }
}
