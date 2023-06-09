<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class CurierController extends Controller
{
    public function courierDash()
    {
        return view('curierDash');
    }
    public function getOrders()
    {
        $orders = DB::table('orders')->select([
                                                "orders.id as orderID",
                                                "restaurants.id as restID",
                                                "foods.id as foodID",
                                                "addresses.id as addrID",
                                                "users.id as userID",
                                                "order_foods.o_id",
                                                "order_foods.f_id",
                                                "foods.r_id",
                                                "orders.a_id",
                                                "addresses.u_id",
                                                "restaurants.r_name",
                                                "restaurants.address as restAddr",
                                                "foods.f_name",
                                                "order_foods.count",
                                                "orders.o_status",
                                                "orders.payment_method",
                                                "addresses.address as userAddr",
                                                "users.u_fullname"
                                                ])
        ->join('order_foods', 'orders.id', '=', 'o_id')
        ->join('foods', 'foods.id', '=', 'f_id')
        ->join('restaurants', 'restaurants.id', '=', 'r_id')
        ->join('addresses', 'addresses.id', '=', 'a_id')
        ->join('users', 'users.id', '=', 'u_id')
        ->where('o_status', '=', 1)
        ->get();




        return  $orders->toJson();
    }
    public function acceptOrder(Request $request)
     {
       error_log($request->orderID);
       $orderID=$request->orderID;
        $courierID=Auth::user()->id;

       $trans = DB::transaction(function() use ($orderID, $courierID){
            DB::table('orders')
            ->where('id', $orderID)
            ->update(['c_id' => $courierID,'o_status' => 2]);
            return(true);
        });
        error_log($trans);
        if ($trans) {
            return("Ok");
        }else
        {
            return("notOk");
        }



    }
}
