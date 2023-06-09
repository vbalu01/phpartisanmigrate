<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DashController extends Controller
{
    public function Dashpage()
    {
        if (Auth::guard('courier')->check())
        {
            return redirect("/Dashboard/Courier");
        }
        elseif (Auth::guard('restaurant')->check())
        {
            return redirect("/Dashboard/Restaurant");
        }
        elseif (Auth::guard('admin')->check())
        {
            return redirect("/Dashboard/Admin");
        }
    }




    public function restaurantDash()
    {
        $tmp_h = DB::table('orders')->select(['id', 'c_id', 'a_id', 'o_date', 'o_status', 'payment_method', 'full_price'])->get();
        $tmp_r = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->inRandomOrder()->take(8)->get();
        $tmp_f = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price', 'img_src'])->where([['available', '=', true]])->where([['r_id', '=', $request->rid]])->inRandomOrder()->take(10)->get();
        $tmp_g = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->inRandomOrder()->get()->random(8);
        # code...
        $loggedin = false;
        $allowedtoOrder=false;
        $usermail = "";
        if (Auth::user()!=null) {
            $loggedin = true;
            $usermail = Auth::user()->email;
        }
        //return view('restaurantDash')->with('data', ['orders' =>$tmp_h]);
        return view('restaurantDash')->with('data', ['orders' =>$tmp_h,'allowedToOrder'=> $allowedtoOrder,'loggedIn'=>$loggedin,'usermail'=>$usermail, 'restaurants'=>$tmp_r, 'foods' =>$tmp_f, 'categories' =>$tmp_g]);
    }
    public function adminDash()
    {
        $loggedin = false;
        $allowedtoOrder=false;
        $usermail = "";
        if (Auth::user()!=null) {
            $loggedin = true;
            $usermail = Auth::user()->email;
        }

        $categories = DB::table('categories')->select('id', 'c_name', 'available')->get();
        $restaurants = DB::table('restaurants')->select('id', 'r_name', 'address', 'city_postalcode', 'available')->get();
        $couriers = DB::table('couriers')->select('id', 'email', 'c_name', 'available')->get();

        return view('adminDash')->with('data', [
            'loggedIn' => $loggedin,
            'usermail' => $usermail,
            'allowedToOrder' => $allowedtoOrder=false,
            'categories' =>$categories,
            'restaurants' => $restaurants,
            'couriers' => $couriers
        ]);
    }

    public function insertOrderForm(){

        $addresses = DB::table('addresses')->select(['id', 'a_name'])->get();

        return view('order_create')->with('data', ['addresses' => $addresses]);
        }
        public function insert(Request $request){

            //'id', 'c_id', 'a_id', 'o_date', 'o_status', 'payment_method', 'full_price'
        $c_id = $request->input('c_id');
        $a_id = $request->input('a_id');
        $o_date = $request->input('o_date');
        $o_status = $request->input('o_status');
        $payment_method = $request->input('payment_method');
        $full_price = $request->input('full_price');
        $data=array('c_id'=>$c_id,"a_id"=>$a_id,"o_date"=>$o_date,"o_status"=>$o_status, "payment_method"=>$payment_method, "full_price"=>$full_price);
        DB::table('orders')->insert($data);
        echo "Rendelés felvéve!.<br/>";
       // echo '<a href = "/insert">Click Here</a> to go back.';
        }

}
