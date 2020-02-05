<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Hash;

class RegisterController extends Controller
{
    public function registrationPage() {
    	return view('web.register');
    }

    public function registration(Request $request) {

    	if ($request->input('profile') == 1) {
    		$validatedData = $request->validate([
	            'name' => ['required', 'string', 'max:255'],
	            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
	            'password' => ['required', 'string', 'same:confirm_password'],
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
	            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
	            'password' => ['required', 'string', 'same:confirm_password'],
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
	            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
	            'password' => ['required', 'string', 'same:confirm_password'],
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
	            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
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

    	$user = User::create([
            'name' => ucwords(strtolower($request['name'])),
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'profile_type' => $request['profile'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zip_code' => $request['zip_code'],
            'lab_owner' => $request['lab_owner'],
            'contact_person' => $request['contact_person']
        ]);

        return redirect()->intended('login');
    }
}
