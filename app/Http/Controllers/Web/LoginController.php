<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Session;
use DB;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:users')->except('logout');
    }

    public function showLoginForm()
    {
        return view('web.login', ['url' => 'users']);
    }

    public function userLogin(Request $request){

        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Session::has('cart') && !empty(Session::get('cart'))) {
                $this->cartAdd();
            }
            return redirect()->intended('/');
        }

        return back()->withInput($request->only('email'))->with('login_error','Username or password incorrect');
    }

    public function logout()
    {
        Auth::guard('users')->logout();
        return redirect()->route('web.login');
    }

    function cartAdd(){
        $cart = Session::get('cart');
        $user_id = Auth::guard('users')->user()->id;

        if (count($cart) > 0) {
            foreach ($cart as $product_id => $value1) {
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
                    'size_id' => $value1['size_id'],    
                    'size_value' => $value1['size_value'],                
                    'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                    'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                ]);
                if ($cart_insert) {
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
                        DB::table('cart_detail')
                            ->insert([
                                'cart_id' => $cart_insert,
                                'option_id' => $value['option_id'],
                                'option_detail_id' => $value['option_detail_id'],
                                'option_detail_price' => $option_price->price,
                                'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                            ]);
                    }
                }

            }
        }
        Session::forget('cart');
        Session::save();
        return true;
    }
}
