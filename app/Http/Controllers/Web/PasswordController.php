<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Hash;

class PasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('web.account.change-password');
    }

    
    public function updatePassword(Request $request) {
        $validatedData = $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8', 'same:confirm_password'],
        ]);
        $current_password = Auth::guard('users')->user()->password;   

        if(Hash::check($request->input('current_password'), $current_password)){ 
            DB::table('users')
                ->where('id', Auth()->user()->id)
                ->update([
                    'password' => Hash::make($request['new_password'])
                ]); 
            
            return redirect()->back()->with('message', 'Password Changed Successfully');
        }else{            
            return redirect()->back()->with('error', 'Please Enter Correct Current Password');
        }
    }
}
