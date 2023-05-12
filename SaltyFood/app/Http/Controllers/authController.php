<?php

namespace App\Http\Controllers;

use App\Models\couriers;
use App\Models\DefUser;
use App\Models\restaurants;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{
   function login(Request $request)
   {
    $email=$request->post('email');
    $password=$request->post('pw');


    $loginEntity = Users::where([
        'email' => $email,
        'password' => hasheles($password)
    ])->first();

    if ($loginEntity) {

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
    return redirect('/User');
   }



public function logout()
{
    Session::flush();
    Auth::logout();
    return redirect('/');
}



public function userRegister(Request $request)
{
    /*             $table->string("email",255);
    $table->string("password",255);
    $table->string("u_fullname",255);
    $table->boolean("available");*/

    $email=$request->post('email');
    $password=$request->post('pw');
    $fullname=$request->post('fname');

    $loginEntity=null;
    $loginEntity = Users::where([
        'email' => $email
    ])->first();



    if ($loginEntity==null) {
        $loginEntity = couriers::where([
            'email' => $email
        ])->first();

    }


    if($loginEntity == null) {
        $f = null;
        $f = new Users();




        try {
            $f->email =$email;
            $f->password = hasheles($password);
            $f->u_fullname=$fullname;

            $f->save();
            $a='Sikeres mentés. Azonosító: ';
            return redirect('/login')->with('message', $a);
        } catch (\Throwable $th) {
            dd("kaki");
            return redirect('/login')->with('alert', 'Sikertelen mentés');
        }



}

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
