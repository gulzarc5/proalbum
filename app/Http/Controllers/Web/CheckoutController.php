<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $user_id = Auth::guard('users')->user()->id;
        $product_price = 0;
        // To Check Cart Has Data Or Not
        $cart = DB::table('cart')->where('user_id',$user_id)->get();
        if ($cart->count() > 0) {
            foreach ($cart as $key => $carts) {
                $product_details = DB::table('products')
                        ->where('id',$carts->product_id)
                        ->first();
                $product_price += $product_details->sheet_price;
                $size = DB::table('product_size')->where('id', $carts->size_id)->first();
                if ($carts->size_value > $product_details->sheet_value ) {
                    $extra_sheet = ($carts->size_value - $product_details->sheet_value);
                    $extra_sheet_price = ($extra_sheet * $size->extra_page_price);
                    $product_price +=$extra_sheet_price;
                }
                $option_details = DB::table('cart_detail')->where('cart_id',$carts->id)->get();
                if ($option_details->count() > 0 ) {
                    foreach ($option_details as $key1 => $value1) {
                        $option_price = DB::table('product_option_details_price')
                            ->select('price')
                            ->where('option_details_id',$value1->option_detail_id)
                            ->where('size_id',$carts->size_id)
                            ->first();
                        $product_price +=$option_price->price;
                    }
                    
                }
            }
        }else{
            return redirect()->back();
        }

        $shipping_address = DB::table('shipping_address')->where('user_id',$user_id)->get();

        return view('web.shop-checkout',compact('shipping_address','product_price'));
    }
}
