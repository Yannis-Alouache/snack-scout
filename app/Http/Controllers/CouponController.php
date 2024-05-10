<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
    public function applyCoupon(Request $request) {
        $request->validate([
            'coupon' => 'required|string',
        ]);

        $codeCoupon = $request->coupon;
        $coupon = Coupon::where('code', $codeCoupon)->first();
        
        session()->put("reduction", $coupon->reduction);        

        if ($coupon) {
            return redirect()->back()->with([
                'success' => 'Coupon appliqué avec succès !',
            ]);
        } else {
            return redirect()->back()->with('error', 'Code de coupon invalide.');
        }
    }
}
