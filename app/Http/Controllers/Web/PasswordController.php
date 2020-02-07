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
        $user = DB::table('users')
            ->where('id', Auth()->user()->id)
            ->first();
        
        return view('web.account.change-password', ['user' => $user]);
    }

    
    public function updatePassword(Request $request) {

    	$validatedData = $request->validate([
            'new_password' => ['required', 'string', 'same:confirm_password'],
        ]);

        DB::table('users')
            ->where('id', Auth()->user()->id)
            ->update([
                'password' => Hash::make($request['new_password'])
            ]);

        return redirect()->back()->with('msg', 'Password has been changed');
    }
}
