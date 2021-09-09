<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request){

//       Jeśli nie zalogowany to przekierowanie na stronę powitalną
        if (!Auth::check() && $request->path() == '/') {
            return view('welcome');
        }else if (!Auth::check() && $request->path() != '/') {
            return view('welcome');
        }
//       Jeśli zalogowany to przekierowanie na stronę powitalną użytkownika
        $user = Auth::user();
        if(Auth::check()){
            return view('welcome');
        }
    }
    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required | email',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return response()->json([
                'msg' => 'You are logged in',
            ]);
        }else{
            return response()->json([
                'msg' => 'Wprowadzone dane nie są poprawne',
            ],401);
        }

    }
    public function logout(){
        Auth::logout();
        return view('welcome');
    }

    public function register(Request $request){
            $this->validate($request,[
                'email' => 'required | email | unique:users',
                'password' => 'required',
            ]);
            return User::create([
                        'name'=>$request->name,
                        'surname'=>$request->surname,
                        'nick'=>$request->nick,
                        'email'=>$request->email,
                        'password'=>bcrypt($request->password),
                        'phone'=>$request->phone,
                        'age'=>$request->age,
                        'height'=>$request->height,
                        'sex'=>$request->sex,
                        'showUserName'=>$request->showUserName
                    ]);

        }
    public function unauthorised(){
        return view('pagenotfound');
    }
}
