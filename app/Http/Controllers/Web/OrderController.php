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
                        'quantity' => $carts->quantity,
                        'file_link' =>$file_link[$carts->product_id],
                        'file_password' =>$file_password[$carts->product_id],
                        'size_id' => $carts->size_id,
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
                                        'option_price' => $value1->option_detail_price,
                                        'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                                        'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                                    ]);
                            }
                            
                        }
                        $subtotal = $product_price*$carts->quantity;
                        $vat = floatval(($subtotal*15)/100);
                        $total = $subtotal+$vat;

                        DB::table('order_detail')->where('id',$order_details)
                            ->update([
                                'product_price' => $product_price,
                                'sub_total' => $subtotal,
                                'vat' => $vat,
                                'product_total_price' => $total,
                            ]);
                        
                    }
                    $total_order_price+=$subtotal;
                }
                $subtotal = $total_order_price;
                $vat = (($subtotal*15)/100);
                $total_order_price = ($subtotal+$vat);

                DB::table('orders')->where('id',$orders)
                    ->update([
                        'sub_total'=>$subtotal,
                        'vat' => $vat,
                        'total_quantity'=>$cart->count(),
                        'total_price' => $total_order_price,
                    ]);
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

    public function orderHistory()
    {
        $user_id = Auth::guard('users')->user()->id;
        $orders = DB::table('orders')->where('user_id',$user_id)->orderBy('id','desc')->limit(30)->get();
        if ($orders->count() > 0) {
            foreach ($orders as $key => $value) {
                $ord_det= DB::table('order_detail')
                    ->select('order_detail.*','products.name as p_name','products.image as p_image','product_size.display_name as size_name')
                    ->leftjoin('products','products.id','=','order_detail.product_id')
                    ->leftjoin('product_size','product_size.id','=','order_detail.size_id')
                    ->where('order_detail.order_id',$value->id)->get();
                
                if ($ord_det->count()) {
                    foreach ($ord_det as $key1 => $value1) {
                        $ord_options = DB::table('order_options')
                            ->select('product_option.name as option_name','product_option_details.name as option_details_name')
                            ->leftjoin('product_option','product_option.id','=','order_options.option_id')
                            ->leftjoin('product_option_details','product_option_details.id','=','order_options.option_details_id')
                            ->where('order_options.order_details_id',$value1->id)
                            ->get();
                        $value1->options = $ord_options;
                    }                   
                }
                $value->order_details  = $ord_det;
            }
        }
        return view('web.shop-order',compact('orders'));
    }

    public function orderCancel($id)
    {
        try {
            $id = decrypt($id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        DB::table('orders')->where('id',$id)->update(['order_status'=>'5','cancelled_by'=>'1']);
        DB::table('order_detail')->where('order_id',$id)->update(['order_status'=>'5','cancelled_by'=>'1']);

        return redirect()->back();
    }

    public function orderDetailsCancel($order_id,$order_details_id)
    {
        try {
            $order_id = decrypt($order_id);
            $order_details_id = decrypt($order_details_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        DB::table('order_detail')->where('id',$order_details_id)->update(['order_status'=>'5','cancelled_by'=>'1']);
        $order_cancel_check =  DB::table('order_detail')->where('order_id',$order_id)->get();
        $cancel_status = true;

        foreach ($order_cancel_check as $key => $value) {
            if ($value->order_status < 5) {
                $cancel_status = false;
                break;
            }
        }
        if ($cancel_status == true) {
            DB::table('orders')->where('id',$order_id)->update(['order_status'=>'5','cancelled_by'=>'1']);
        }
        return redirect()->back();

    }
}
