<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function applyCoupon(Request $request){

        // $kupon = Coupon::all();
        $kupon = $request->input('kupon');
        $cektbl = Coupon::find($kupon);
        if($cektbl){
            $potongan = $cektbl->amount;
            // return 'Anda menggunakan kupon diskon. Potongan Rp. ' . $potongan;
             return response()->json(['potongan' => $potongan]);
            // return 'Anda menggunakan kupon diskon. Potongan harga: Rp. ' . $potonganHarga;
        }
        else{
            return 'Kode kupon tidak valid.';
        }
    }
}
