<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;

class ShippingController extends Controller
{
    public function shippingAddressList()
    {
    	$shipping_address = DB::table('shipping_address')
    		->leftJoin('users', 'shipping_address.user_id', 'users.id')
            ->where('user_id', Auth()->user()->id)
            ->select('users.name', 'shipping_address.*')
            ->get();

        return view('web.account.shipping', ['shipping_address' => $shipping_address]);
    }

    public function editShippingAddress()
    {
        return view('web.account.shipping-edit');
    }

    public function updateShippingAddress(Request $request) {

    	$validatedData = $request->validate([
	        'address' => ['required', 'string', 'max:255'],
	        'contact_no' => 'required',
	        'address' => ['required', 'string', 'max:255'],
	        'city' => ['required', 'string', 'max:255'],
	        'state' => ['required', 'string', 'max:255'],
	        'zip_code' => ['required', 'string', 'max:255'],
	    ]);

    	DB::table('shipping_address')
    		->insert([
    			'user_id' => Auth()->user()->id,
	            'address' => $request->input('address'),
	            'contact_no' => $request->input('contact_no'),
	            'city' => $request->input('city'),
	            'state' => $request->input('state'),
	            'zip_code' => $request->input('zip_code'),
    		]);

        return redirect()->route('web.shipping_address_list');
	}
	
	public function addShippingAddress(Request $request)
	{
		$this->validate($request, [
            'name'   => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'mobile' => 'required',
            'pin' => 'required',
		]);
		
		DB::table('shipping_address')
			->insert([
				'user_id' => $user_id = Auth::guard('users')->user()->id,
				'name'=> $request->input('name'),
				'email'=> $request->input('email'),
				'address'=> $request->input('address'),
				'city'=> $request->input('city'),
				'state'=> $request->input('state'),
				'contact_no'=> $request->input('mobile'),
				'zip_code'=> $request->input('pin'),
				'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
				'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
			]);
		return redirect()->back();
	}

	
}
