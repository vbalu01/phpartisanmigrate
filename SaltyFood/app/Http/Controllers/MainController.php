<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Nette\Utils\Json;

class MainController extends Controller
{
    public function mainPage(Request $request)
    {
        $tmp_r = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->inRandomOrder()->take(8)->get();

        $tmp_f = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price', 'img_src'])->where([['available', '=', true]])->inRandomOrder()->take(10)->get();
        $tmp_f2 =  DB::table('foods')->select(['id', 'r_id', 'f_name', 'c_id', 'description', 'price', 'img_src'])->where([['available', '=', true]])->get();
        $tmp_g = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->get();


        if(url()->current()==URL::to('/'))
        {
            if (Auth::guard('user')->check()||Auth::guard('courier')->check()||Auth::guard('restaurant')->check()||Auth::guard('admin')->check()) {
                return redirect('/User');
            }
        }

        $loggedin = false;
        $usermail = "";
        if (Auth::user()!=null) {
            $loggedin = true;
            $usermail = Auth::user()->email;
        }
        $allowedtoOrder=true;
        if (Auth::guard('courier')->check()||Auth::guard('restaurant')->check()) {
            $allowedtoOrder=false;
        }

        return view('index')->with('data', ['allowedToOrder'=> $allowedtoOrder,'loggedIn'=>$loggedin,'usermail'=>$usermail, 'restaurants'=>$tmp_r, 'foods' =>$tmp_f,'allfoods' =>$tmp_f2, 'categories' =>$tmp_g,'selected_categ'=>'all']);

    }

    public function main_filter_cat(Request $request)
    {
        if($request->fname=="all")
        {
            return redirect('/');

        }else{
            $tmp_r = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->inRandomOrder()->take(8)->get();

            $tmp_f = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price', 'img_src'])->where([['available', '=', true]])->inRandomOrder()->take(10)->get();
            $catTMP=DB::table('categories')->select('id')->where([['c_name', '=', $request->fname]])->first();

            $tmp_f2 =  DB::table('foods')->select(['id', 'r_id', 'f_name', 'c_id', 'description', 'price', 'img_src'])->where([['available', '=', true]])->where([['c_id', '=', $catTMP->id]])->get();
            $tmp_g = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->get();
            $loggedin = false;
            $usermail = "";
            if (Auth::user()!=null) {
                $loggedin = true;
                $usermail = Auth::user()->email;
            }
            $allowedtoOrder=true;
            if (Auth::guard('courier')->check()||Auth::guard('restaurant')->check()) {
                $allowedtoOrder=false;
            }
            return view('index')->with('data', ['allowedToOrder'=> $allowedtoOrder,'loggedIn'=>$loggedin,'usermail'=>$usermail, 'restaurants'=>$tmp_r, 'foods' =>$tmp_f,'allfoods' =>$tmp_f2, 'categories' =>$tmp_g,'selected_categ'=>$request->fname]);
        }
    }
    public function shoppingPage(Request $request)
    {
        $tmp_r = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->inRandomOrder()->take(8)->get();
        $tmp_f = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price', 'img_src'])->where([['available', '=', true]])->inRandomOrder()->take(10)->get();
        $tmp_g = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->inRandomOrder()->get()->random(8);

        $loggedin = false;
        $usermail = "";
        if (Auth::user()!=null) {
            $loggedin = true;
            $usermail = Auth::user()->email;
        }
        return view('shop')->with('data', ['loggedIn'=>$loggedin,'usermail'=>$usermail, 'restaurants'=>$tmp_r, 'foods' =>$tmp_f, 'categories' =>$tmp_g]);




    }

    public function shoppingCartPage(Request $request)
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
        $usermail = "";
        if(url()->current()==URL::to('/shoppingCart'))
        {
            if (Auth::guard('user')->check()||Auth::guard('courier')->check()||Auth::guard('restaurant')->check()||Auth::guard('admin')->check()) {
                return redirect('/User/shoppingCart');
            }
        }

        if (Auth::user()!=null) {
            $loggedin = true;
            $userid = Auth::user()->id;
            $usermail = Auth::user()->email;
        }
        return view('shoppingCart')->with('data', ['loggedIn'=>$loggedin,'usermail'=> $usermail,'userid'=> $userid]);



    }


    public function shop_filter_vend(Request $request)
    {
        $tmp_r = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->inRandomOrder()->take(8)->get();
        $tmp_f = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price', 'img_src'])->where([['available', '=', true]])->where([['r_id', '=', $request->rid]])->inRandomOrder()->take(10)->get();
        $tmp_h = DB::table('orders')->select(['id', 'c_id', 'a_id', 'o_date', 'o_status', 'payment_method', 'full_price'])->get();
        $tmp_g = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->inRandomOrder()->get()->random(8);

        $loggedin = false;
        $usermail = "";
        if (Auth::user()!=null) {
            $loggedin = true;
            $usermail = Auth::user()->email;
        }
        return view('shop')->with('data', ['loggedIn'=>$loggedin,'usermail'=>$usermail, 'restaurants'=>$tmp_r, 'foods' =>$tmp_f, 'categories' =>$tmp_g, 'orders' =>$tmp_h]);

    }


}
