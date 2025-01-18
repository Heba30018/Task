<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle the login process
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($request->only('username', 'password'), $request->remember)) {
            $role = Auth::user()->role_as;
        
            switch ($role) {
                case 'admin':
                    return redirect()->route('home.admin');
                case 'customer':
                    return redirect()->route('home.customer');
                case 'vendor':
                    return redirect()->route('home.vendor');
                default:
                    return redirect('/'); // Default redirect if role is not matched
            }
        }
    
        return back()->withErrors([
            'username' => 'Invalid credentials. Please try again.',
        ]);
    }
    

    // Show the dashboard (only accessible if logged in)
    public function dashboard()
    {
        return view('home');
    }


}
