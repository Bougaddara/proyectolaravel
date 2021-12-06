<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function admin(){
        return view('adminhome');
    }

    public function user(){
        return view('userhome');
    }

    public function adminlogin(){
        return view('Auth.adminlogin');
    }

    public function checkadminlogin(Request $request)
    {
     $this->validate($request,[
         'email' => 'required|email',
         'password' => 'required|min:8'
     ]);   

     if (Auth::guard('admins')->attempt(['email' => $request->email, 'password' => $request ->password])){

        return redirect()-> intended('/admin');

    }

    return back() -> withInput($request-> only('email'));
}



}
