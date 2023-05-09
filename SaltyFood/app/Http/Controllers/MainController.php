<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function mainPage(Request $request)
    {
        $tmp_r = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->get()->random(8);
        $tmp_f = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price', 'img_src'])->where([['available', '=', true]])->get()->random(10);
        $loggedin = false;
        $usermail = "";
        if (Auth::user()!=null) {
            $loggedin = true;
            $usermail = Auth::user()->email;
        }

        return view('index')->with('data', ['loggedIn'=>$loggedin,'usermail'=>$usermail, 'restaurants'=>$tmp_r, 'foods' =>$tmp_f ]);

    }

}
