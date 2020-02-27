<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Hash;
// use App\User;
// use Sentinal;
// use Reminder;
// use Mail;


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

    // public function passwordResetEmail(Request $request)
    // {
    //     // dd($request->all());
    //     $user = User::where('email',$request->email)->first();
    //     if ($user == null) {
    //         return redirect()->back()->with('error','Email Id Does Not Exist');
    //     }

    //     $user = Sentinal::findById($user->id);
    //     $reminder = Reminder::exists($user) ? : Reminder::create($user);
    //     $this->sendEmail($user,$reminder->code);

    //     return redirect()->back()->with('success','Reset Link Send SuccessFully To Your Email');
    // }
    
    // public function sendEmail($user,$code)
    // {
    //     Mail::send(
    //         'email.send_email',
    //         ['user' => $user, 'code' => $code],
    //         function($message) use ($user){
    //             $message->to($user->email);
    //             $message->subject("Hello $user->name, Reset Your Password ");
    //         }
    //     );
    // }
}
