<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;

class RegisterController extends Controller
{
    public function create(){
       
        return view('register');
    }

    public function store(){

   
        request()->validate(
            [
                'username' =>['required', 'min:3'],
                'role' => ['required' ]
            ]
        );
       $user = new User();
       $user->username = request()->username;
       $user->password = request()->password;
       $user->role_as = request()->role;
        $user->save();


  
        return view('login');
    }

}
