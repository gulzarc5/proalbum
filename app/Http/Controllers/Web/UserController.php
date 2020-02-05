<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    public function myProfile()
    {
        $my_account = DB::table('users')
            ->where('id', Auth()->user()->id)
            ->first();

        return view('web.account.profile', ['my_account' => $my_account]);
    }

    public function editMyProfile()
    {
        $my_account = DB::table('users')
            ->where('id', Auth()->user()->id)
            ->first();

        return view('web.account.profile-edit', ['my_account' => $my_account]);
    }

    public function updateMyProfile(Request $request) {

    	if ($request->input('profile') == 1) {
    		$validatedData = $request->validate([
	            'name' => ['required', 'string', 'max:255'],
	            'email' => ['required', 'string', 'email', 'max:255'],
	            'lab_owner' => ['required', 'string', 'max:255'],
	            'contact_person' => ['required', 'string', 'max:255'],
	            'address' => ['required', 'string', 'max:255'],
	            'city' => ['required', 'string', 'max:255'],
	            'state' => ['required', 'string', 'max:255'],
	            'zip_code' => ['required', 'string', 'max:255'],
	        ]);
    	} 
    	else if ($request->input('profile') == 2){
    		$validatedData = $request->validate([
	            'name' => ['required', 'string', 'max:255'],
	            'email' => ['required', 'string', 'email', 'max:255'],
	            'contact_person' => ['required', 'string', 'max:255'],
	            'address' => ['required', 'string', 'max:255'],
	            'city' => ['required', 'string', 'max:255'],
	            'state' => ['required', 'string', 'max:255'],
	            'zip_code' => ['required', 'string', 'max:255'],
	        ]);
    	} 
    	else if ($request->input('profile') == 1){
    		$validatedData = $request->validate([
	            'name' => ['required', 'string', 'max:255'],
	            'email' => ['required', 'string', 'email', 'max:255'],
	            'contact_person' => ['required', 'string', 'max:255'],
	            'address' => ['required', 'string', 'max:255'],
	            'city' => ['required', 'string', 'max:255'],
	            'state' => ['required', 'string', 'max:255'],
	            'zip_code' => ['required', 'string', 'max:255'],
	        ]);
    	}
    	else {
    		$validatedData = $request->validate([
	            'name' => ['required', 'string', 'max:255'],
	            'email' => ['required', 'string', 'email', 'max:255'],
	            'password' => ['required', 'string', 'same:confirm_password'],
	            'lab_owner' => ['required', 'string', 'max:255'],
	            'contact_person' => ['required', 'string', 'max:255'],
	            'address' => ['required', 'string', 'max:255'],
	            'city' => ['required', 'string', 'max:255'],
	            'state' => ['required', 'string', 'max:255'],
	            'zip_code' => ['required', 'string', 'max:255'],
	            'profile' => 'required',
	        ]);
    	}

    	DB::table('users')
    		->where('id', Auth()->user()->id)
    		->update([
    			'name' => ucwords(strtolower($request->input('name'))),
    			'email' => $request['email'],
	            'profile_type' => $request['profile'],
	            'address' => $request['address'],
	            'city' => $request['city'],
	            'state' => $request['state'],
	            'zip_code' => $request['zip_code'],
	            'lab_owner' => $request['lab_owner'],
	            'contact_person' => $request['contact_person']
    		]);

        return redirect()->back();
    }
}
