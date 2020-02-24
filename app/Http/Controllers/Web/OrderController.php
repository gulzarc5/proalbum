<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function orderPlace(Request $request)
    {
        $this->validate($request, [
            'payment'   => 'required',
            'address_id' => 'required',
        ]);

        $file_link = $request->input('file_link'); //Array of data
        $file_password = $request->input('file_password'); //Array of data
        $payment = $request->input('payment');
        $address_id = $request->input('address_id');
        $user_id = Auth::guard('users')->user()->id;        
        $cart = DB::table('cart')->where('user_id',$user_id)->get();
        if ($cart->count() > 0) {
            $orders = DB::table('orders')
                ->insertGetId([
                    'user_id' => $user_id,
                    'address_id' => $request->input('address_id'),
                    'payment_method' => $request->input('payment'),
                    'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                    'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                ]);
            if ($orders) {  
                $total_order_price = 0;                  
                foreach ($cart as $key => $carts) {
                    $product_price = 0;
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

                    $order_details = DB::table('order_detail')
                    ->insertGetId([
                        'order_id' => $orders,
                        'product_id' => $carts->product_id,
                        'sheet_name' => $product_details->sheet_name,
                        'sheet_value' => $product_details->sheet_value,
                        'file_link' =>$file_link[$carts->product_id],
                        'file_password' =>$file_password[$carts->product_id],
                        'size_id' => $carts->size_id,
                        'product_price' => $product_price,
                        'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                    ]);
                    if ($order_details) {
                        $option_details = DB::table('cart_detail')->where('cart_id',$carts->id)->get();
                        if ($option_details->count() > 0 ) {
                            foreach ($option_details as $key1 => $value1) {
                                
                                $option_price = DB::table('product_option_details_price')
                                    ->select('price')
                                    ->where('option_details_id',$value1->option_detail_id)
                                    ->where('size_id',$carts->size_id)
                                    ->first();
                                $product_price +=$option_price->price;

                                DB::table('order_options')
                                    ->insert([
                                        'order_details_id' => $order_details,
                                        'option_id' => $value1->option_id,
                                        'option_details_id' => $value1->option_detail_id,
                                        'option_price' => $value1->option_detail_id,
                                        'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                                        'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                                    ]);
                            }
                            
                        }
                        DB::table('order_detail')->where('id',$order_details)->update(['product_total_price' => $product_price]);
                        
                    }
                    $total_order_price+=$product_price;
                }
                DB::table('orders')->where('id',$orders)->update(['total_price'=>$total_order_price,'total_quantity'=>$cart->count()]);
                return redirect()->route('web.order_success');
            }else{
                return redirect()->back()->with('error','Something Went Wrong Please Try Again');
            }
        }else{
            return redirect()->back()->with('error','Please Add Data Into Cart');
        }
    }

    public function orderSuccess()
    {        
        return view('web.shop-thank');
    }
}
