<?php

//eznekemkell
// "publicKey" => "BDXLfLM4pXv3_ChmODNsXTk7E6YR8ZSE9lXe3XMWmjiI_9GQTrsoJeZq0Htzv3pnoBrq0g5iGOsvMaXJBXG5Gjk"
//"privateKey" => "eqB3I-E5sD3j-y0LQy2HznrLBjYceKE15SG5fhZfKxA"


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
        if ($loginEntity->role=="admin") {
            Auth::guard('admin')->login($loginEntity);
        }

        else{
            Auth::guard('user')->login($loginEntity);
        }

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


/*Table app.couriers{
    id int [PK, increment]
    email varcahr [NOT NULL]
    c_name varcahr [NOT NULL]
    password varcahr [NOT NULL]
    available boolean [NOT NULL]
    }*/

public function courierRegister(Request $request)
{
    /*             $table->string("email",255);
    $table->string("password",255);
    $table->string("u_fullname",255);
    $table->boolean("available");*/

    $email=$request->post('email');
    $password=$request->post('password');
    $c_name=$request->post('c_name');
    $available=$request->post('available');

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
        $f = new couriers();
    try {
        $f->email =$email;
        $f->password = hasheles($password);
        $f->c_name=$c_name;
        $f->available=$available;
        $f->save();
        $a='Sikeres mentés. Azonosító: ';
        return redirect('/login')->with('message', $a);
    } catch (\Throwable $th) {
        dd($th);
        return redirect('/login')->with('alert', 'Sikertelen mentés');
    }
}

}

public function restaurantRegister(Request $request)
{
    /*             $table->string("email",255);
    $table->string("password",255);
    $table->string("u_fullname",255);
    $table->boolean("available");*/

    $email=$request->post('email');
    $password=$request->post('password');
    $r_name=$request->post('r_name');
    $address=$request->post('address');
    $city_postalcode=$request->post('city_postalcode');
    $available=$request->post('available');

    $loginEntity=null;
    $loginEntity = Users::where([
        'email' => $email
    ])->first();
    if ($loginEntity==null) {
        $loginEntity = restaurants::where([
            'email' => $email
        ])->first();

    }
    if($loginEntity == null) {
        $f = null;
        $f = new restaurants();
    try {
        $f->email =$email;
        $f->password = hasheles($password);
        $f->r_name=$r_name;
        $f->address=$address;
        $f->city_postalcode=$city_postalcode;
        $f->available=$available;
        $f->save();
        $a='Sikeres mentés. Azonosító: ';
        return redirect('/login')->with('message', $a);
    } catch (\Throwable $th) {
        dd($th);
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
