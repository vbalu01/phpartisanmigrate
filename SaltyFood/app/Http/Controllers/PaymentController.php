<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function paymentPage(Request $request)
    {
        /*$tmp_r = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->inRandomOrder()->take(8)->get();
        $tmp_f = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price', 'img_src'])->where([['available', '=', true]])->inRandomOrder()->take(10)->get();
        $tmp_g = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->inRandomOrder()->get()->random(8);

        $loggedin = false;
        $usermail = "";
        if (Auth::user()!=null) {
            $loggedin = true;
            $usermail = Auth::user()->email;
        }
        return view('shoppingCart')->with('data', ['loggedIn'=>$loggedin,'usermail'=>$usermail, 'restaurants'=>$tmp_r, 'foods' =>$tmp_f, 'categories' =>$tmp_g]);
        */

        $loggedin = false;
        $userid = null;

        if (Auth::user()!=null) {
            $loggedin = true;
            $userid = Auth::user()->id;
        }

        $addresses = DB::table('addresses')->select(['id', 'a_name'])->where([['u_id', '=', $userid]])->get();

        return view('payment')->with('data', ['loggedIn'=>$loggedin,'usermail'=>$userid, 'addresses'=>$addresses]);



    }
}
