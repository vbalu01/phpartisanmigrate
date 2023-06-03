<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function mainPage()
    {
        $tmp_r = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->inRandomOrder()->take(8)->get();

        $tmp_f = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price', 'img_src'])->where([['available', '=', true]])->inRandomOrder()->take(10)->get();
        $tmp_f2 =  DB::table('foods')->select(['id', 'r_id', 'f_name', 'c_id', 'description', 'price', 'img_src'])->where([['available', '=', true]])->get();
        $tmp_g = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->get();

        $loggedin = false;
        $usermail = "";
        if (Auth::user()!=null) {
            $loggedin = true;
            $usermail = Auth::user()->email;
        }

        return view('index')->with('data', ['loggedIn'=>$loggedin,'usermail'=>$usermail, 'restaurants'=>$tmp_r, 'foods' =>$tmp_f,'allfoods' =>$tmp_f2, 'categories' =>$tmp_g,'selected_categ'=>'all']);

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
            return view('index')->with('data', ['loggedIn'=>$loggedin,'usermail'=>$usermail, 'restaurants'=>$tmp_r, 'foods' =>$tmp_f,'allfoods' =>$tmp_f2, 'categories' =>$tmp_g,'selected_categ'=>$request->fname]);
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
        $tmp_r = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->inRandomOrder()->take(8)->get();
        $tmp_f = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price', 'img_src'])->where([['available', '=', true]])->inRandomOrder()->take(10)->get();
        $tmp_g = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->inRandomOrder()->get()->random(8);

        $loggedin = false;
        $usermail = "";
        if (Auth::user()!=null) {
            $loggedin = true;
            $usermail = Auth::user()->email;
        }
        return view('shoppingCart')->with('data', ['loggedIn'=>$loggedin,'usermail'=>$usermail, 'restaurants'=>$tmp_r, 'foods' =>$tmp_f, 'categories' =>$tmp_g]);




    }
    public function shop_filter_vend(Request $request)
    {
        $tmp_r = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->inRandomOrder()->take(8)->get();
        $tmp_f = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price', 'img_src'])->where([['available', '=', true]])->where([['r_id', '=', $request->rid]])->inRandomOrder()->take(10)->get();
        $tmp_g = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->inRandomOrder()->get()->random(8);

        $loggedin = false;
        $usermail = "";
        if (Auth::user()!=null) {
            $loggedin = true;
            $usermail = Auth::user()->email;
        }
        return view('shop')->with('data', ['loggedIn'=>$loggedin,'usermail'=>$usermail, 'restaurants'=>$tmp_r, 'foods' =>$tmp_f, 'categories' =>$tmp_g]);

    }
}
