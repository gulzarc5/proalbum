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
            
            return redirect()->intended('/');
        }

        return back()->withInput($request->only('email'))->with('login_error','Username or password incorrect');
    }

    public function logout()
    {
        Auth::guard('users')->logout();
        return redirect()->route('web.login');
    }
}
