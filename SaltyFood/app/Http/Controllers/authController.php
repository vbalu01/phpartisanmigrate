<?php

namespace App\Http\Controllers;

use App\Models\couriers;
use App\Models\restaurants;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class authController extends Controller
{
   function login(Request $request)
   {
    $email=$request->post('email');
    $password=$request->post('pw');

    $loginEntity=null;
    $loginEntity = Users::where([
        'email' => $email,
        'password' => hasheles($password)
    ])->first();

    if ($loginEntity!=null) {
        Auth::guard('user')->login($loginEntity);
    }

    if ($loginEntity==null) {
        $loginEntity = restaurants::where([
            'email' => $email,
            'password' => hasheles($password)
        ])->first();
        if ($loginEntity!=null) {
            Auth::guard('restaurant')->login($loginEntity);
        }
    }

    if ($loginEntity==null) {
        $loginEntity = couriers::where([
            'email' => $email,
            'password' => hasheles($password)
        ])->first();
        if ($loginEntity!=null) {
            Auth::guard('courier')->login($loginEntity);
        }
    }
    if ($loginEntity==null) {
        return redirect('/login')->with('wronglogin', true);
    }
    return redirect('/');
   }
public function logout()
{
    Session::flush();
    Auth::logout();
    return redirect('/');
}
}
 function hasheles($pw)
    {

        $prefix = '$2y$';
        $cost = '10';
        $salt = '$thisisahardcodedsalt$';
        $blowfishPrefix = $prefix.$cost.$salt;
        $password = $pw;
        $hash = crypt($password, $blowfishPrefix);
       return  $hash;
    }
