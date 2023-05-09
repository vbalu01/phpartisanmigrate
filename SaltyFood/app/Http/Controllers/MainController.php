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
        $tmp_f2 =  DB::table('foods')->select(['id', 'r_id', 'f_name', 'c_id', 'description', 'price', 'img_src'])->where([['available', '=', true]])->get();
        $tmp_g = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->get();
        $loggedin = false;
        $usermail = "";
        if (Auth::user()!=null) {
            $loggedin = true;
            $usermail = Auth::user()->email;
        }

        return view('index')->with('data', ['loggedIn'=>$loggedin,'usermail'=>$usermail, 'restaurants'=>$tmp_r, 'foods' =>$tmp_f,'allfoods' =>$tmp_f2, 'categories' =>$tmp_g]);

    }

    public function shoppingPage(Request $request)
    {
        $tmp_r = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->get()->random(8);
        $tmp_f = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price', 'img_src'])->where([['available', '=', true]])->get()->random(10);
        $tmp_g = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->get()->random(8);
        $loggedin = false;
        $usermail = "";
        if (Auth::user()!=null) {

            $loggedin = true;
            $usermail = Auth::user()->email;

            return view('shop')->with('data', ['loggedIn'=>$loggedin,'usermail'=>$usermail, 'restaurants'=>$tmp_r, 'foods' =>$tmp_f, 'categories' =>$tmp_g]);
        } else {
            $loggedin = false;

            echo("<script> alert('A bolthoz be kell jelentkezni!');
            window.location.replace('/')</script>");
        }

       

    }

}
