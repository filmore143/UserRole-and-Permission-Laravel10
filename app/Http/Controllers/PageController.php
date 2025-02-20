<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function welcomePage(Request $request){

        if(Auth::check()){
            // return view('auth.login'); or
            return redirect()->route('login');
        }else{
            //return view ('welcome');
            return redirect()->route('dashboard');
        }

    }

    public function update(Request $request)
    {
        // Validate and process the password reset logic

        // After successful password update:
        session()->flash('status', 'Your password has been successfully reset.');

        // Redirect back to the login page or wherever necessary
        return redirect()->route('login');
    }
}
