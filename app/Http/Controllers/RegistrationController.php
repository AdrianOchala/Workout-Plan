<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegistrationController extends Controller
{
    public function checkAuth(){

        if(Auth::check()){
            return 'true';
        }
        return 'false';
    }
    public function registerUser(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'unique:users',
        ]);
        return User::create([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'nick'=>$request->nick,
            'email'=>$request->email,
            'sex'=>$request->userSex,
            'password'=>$request->password,
            'phone'=>$request->phone,
        ]);
    }
}
