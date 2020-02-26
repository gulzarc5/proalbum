<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Session;
use Carbon\Carbon;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'product_id'   => 'required',
            'size_id' => 'required',
            'size_value' => 'required',
        ]);

        $product_id = $request->input('product_id');
        $size_id = $request->input('size_id');
        $size_value = $request->input('size_value');
        $options = $request->input('option_detail_id'); // two dimention array [option_id][optionDetailId]
        
        

        if( Auth::guard('users')->user() && !empty(Auth::guard('users')->user()->id)) {
            $user_id = Auth::guard('users')->user()->id;
            /// Check If cart Has product or not If yes Delete
            $cart_check = DB::table('cart')->where('product_id',$product_id)->first();

            if ($cart_check) {
                DB::table('cart')->where('product_id',$product_id)->delete();
                DB::table('cart_detail')->where('cart_id',$cart_check->id)->delete();
            }

            //insert data into cart 
            $cart_insert =  DB::table('cart')
                ->insertGetId([
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'size_id' => $size_id,    
                    'size_value' => $size_value,                
                    'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                    'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                ]);
            if ($cart_insert) {
                if (isset($options) && !empty($options)) {
                    foreach ($options as $key => $value) {
                        if (isset($value[0]) && !empty($value[0])) {
                            $option_price = DB::table('product_option_details_price')
                                ->select('price')
                                ->where('option_details_id',$value[0])
                                ->where('size_id',$size_id)
                                ->first();
                            DB::table('cart_detail')
                                ->insert([
                                    'cart_id' => $cart_insert,
                                    'option_id' => $key,
                                    'option_detail_id' => $value[0],
                                    'option_detail_price' => $option_price->price,
                                    'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                                    'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                                ]);
                        }
                    }
                }
            }

        }else{
            if (Session::has('cart') && !empty(Session::get('cart'))) {
                $cart = Session::get('cart');
                $option_details = [];
                if (isset($options) && !empty($options)) {
                    foreach ($options as $key => $value) {
                        if (isset($value[0]) && !empty($value[0])) {
                            // print "option id  ".$key." Option value id ".$value[0]."<br>";
                            $option_price = DB::table('product_option_details_price')
                                ->select('price')
                                ->where('option_details_id',$value[0])
                                ->where('size_id',$size_id)
                                ->first();
                            $option_details[] = [
                                'option_id' =>  $key,
                                'option_detail_id' => $value[0],
                                'option_detail_price' => $option_price->price,
                            ];
                        }
                    }
                }
                $cart[$product_id] =[
                     'size_id' => $size_id,
                     'size_value' => $size_value,
                     'option_details' => $option_details,
                ];
            }else{
                $option_details = [];
                if (isset($options) && !empty($options)) {
                    foreach ($options as $key => $value) {
                        if (isset($value[0]) && !empty($value[0])) {
                            // print "option id  ".$key." Option value id ".$value[0]."<br>";
                            $option_price = DB::table('product_option_details_price')
                                ->select('price')
                                ->where('option_details_id',$value[0])
                                ->where('size_id',$size_id)
                                ->first();
                            $option_details[] = [
                                'option_id' =>  $key,
                                'option_detail_id' => $value[0],
                                'option_detail_price' => $option_price->price,
                            ];
                        }
                    }
                }
                $cart[$product_id] =[
                     'size_id' => $size_id,
                     'size_value' => $size_value,
                     'option_details' => $option_details,
                ];
            }
            Session::put('cart', $cart);
            Session::save();
        }
        return redirect()->route('web.view_cart');
    }

    public function viewCart()
    {
        if( Auth::guard('users')->user() && !empty(Auth::guard('users')->user()->id)) {
            
            $cartData =[];
            $user_id = Auth::guard('users')->user()->id;
            $cart = DB::table('cart')->where('user_id',$user_id)->get();
            if ($cart->count() > 0) {
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

                    $option_details_data = [];
                    $option_details = DB::table('cart_detail')->where('cart_id',$carts->id)->get();
                    if ($option_details->count() > 0 ) {
                        foreach ($option_details as $key1 => $value1) {
                            $option = DB::table('product_option')
                                ->where('id',$value1->option_id)
                                ->first();
                            $option_details = DB::table('product_option_details')
                                ->where('id',$value1->option_detail_id)
                                ->first();
                            $option_price = DB::table('product_option_details_price')
                                ->select('price')
                                ->where('option_details_id',$value1->option_detail_id)
                                ->where('size_id',$carts->size_id)
                                ->first();
                            $product_price +=$option_price->price;
                            $option_details_data[] = [
                                'option_name' =>  $option->name,
                                'option_detail_name' => $option_details->name,
                                'option_detail_price' => $option_price->price,
                            ];
                        }
                        
                    }
                    $product_price =($product_price * $carts->quantity);
                    $cartData[]=[
                        'cart_id' => $carts->id,
                        'product_id' => $carts->product_id,
                        'product_slug'=> $product_details->slug,
                        'product_name' => $product_details->name,
                        'product_image' =>  $product_details->image,
                        'sheet_name' => $product_details->sheet_name,
                        'sheet_value' => $carts->size_value,
                        'size_name' => $size->display_name,
                        'quantity' => $carts->quantity,
                        'price' => $product_price,
                        'options' => $option_details_data,
                    ];
                }                
            }
        }else{            
            $cartData =[];
            if (Session::has('cart') && !empty(Session::get('cart'))) {
                $cart = Session::get('cart');
                if (count($cart) > 0) {
                    foreach ($cart as $product_id => $value1) {
                        $product_price = 0;
                        $product_details = DB::table('products')
                            ->where('id',$product_id)
                            ->first();
                        $product_price += $product_details->sheet_price;
                        $size = DB::table('product_size')->where('id', $value1['size_id'])->first();

                        if ($value1['size_value'] > $product_details->sheet_value ) {
                            $extra_sheet = ($value1['size_value'] - $product_details->sheet_value);
                            $extra_sheet_price = ($extra_sheet * $size->extra_page_price);
                            $product_price +=$extra_sheet_price;
                        }
                        $option_details_data = [];
                        foreach ($value1['option_details'] as $key => $value) {                           
                            $option = DB::table('product_option')
                                ->where('id',$value['option_id'])
                                ->first();
                            $option_details = DB::table('product_option_details')
                                ->where('id',$value['option_detail_id'])
                                ->first();
                            $option_price = DB::table('product_option_details_price')
                                ->select('price')
                                ->where('option_details_id',$value['option_detail_id'])
                                ->where('size_id',$value1['size_id'])
                                ->first();
                            $product_price +=$option_price->price;
                            $option_details_data[] = [
                                'option_name' =>  $option->name,
                                'option_detail_name' => $option_details->name,
                                'option_detail_price' => $option_price->price,
                            ];
                        }
                        $cartData[]=[
                            'cart_id' => $product_id,
                            'product_id' => $product_id,
                            'product_slug'=> $product_details->slug,
                            'product_name' => $product_details->name,
                            'product_image' =>  $product_details->image,
                            'sheet_name' => $product_details->sheet_name,
                            'sheet_value' => $value1['size_value'],
                            'size_name' => $size->display_name,
                            'price' => $product_price,
                            'quantity' => 1,
                            'options' => $option_details_data,
                        ];
                    }
                }else{
                    return $cartData;
                }
            }
        }
        return view('web.shop-cart',compact('cartData'));
    }

    public function removeCart($cart_id)
    {
        if( Auth::guard('users')->user() && !empty(Auth::guard('users')->user()->id)) {
            DB::table('cart')->where('id',$cart_id)->delete();
            DB::table('cart_detail')->where('cart_id',$cart_id)->delete();
        }else{
            Session::forget('cart.'.$cart_id);
        }
        return redirect()->back();
    }

    public function cartUpdate($cart_id,$quantity)
    {
        $cart = DB::table('cart')
            ->where('id',$cart_id)
            ->update([
                'quantity' => $quantity,
            ]);
        return redirect()->back();
    }


}
