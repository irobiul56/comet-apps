<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginPage()
    {
        return view('admin.pages.login');
    }

    public function login(Request $request)
    {
    
       //validate

       $this-> validate($request, [
        'auth'      => 'required',
        'password'  => 'required'
       ]);

       if (Auth::guard('admin') -> attempt(['email' => $request -> auth, 'password' => $request -> password])) {
        
        return redirect() -> route('admin.Dasboard.page');

       }else{
        
        return redirect() -> route('admin.login.page') -> with('danger', 'Your user or password is not match');

       }

    }
}
