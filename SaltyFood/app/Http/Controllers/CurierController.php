<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class CurierController extends Controller
{
    public function courierDash()
    {
        if (app('App\Http\Controllers\CurierController')->getIfOngoing()) {
           return redirect("/Dashboard/Courier/OngoingDelivery");
        }
        return view('curierDash')->with('data', ['windowType'=> 1]);
    }
    public function getOrders()
    {
        $orders = DB::table('orders')->select([DB::raw('count(order_foods.f_id) as multiplaceCount'),
                                                "orders.id as orderID",
                                                "addresses.address as userAddr",
                                                "users.u_fullname"
                                                ])
        ->join('order_foods', 'orders.id', '=', 'order_foods.o_id')
        ->join('addresses', 'addresses.id', '=', 'orders.a_id')
        ->join('users', 'users.id', '=', 'addresses.u_id')
        ->where('orders.o_status', '=', 1)
        ->groupBy('orders.id')
        ->groupBy('addresses.address')->groupBy('users.u_fullname')
        ->get();
        return  $orders->toJson();
    }
    public function getDetailedOrder(Request $request)  {
        $orderID=$request->orderID;
        error_log( $orderID);
        $orders1 = DB::table('orders')->select([
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
            ->join('order_foods', 'orders.id', '=', 'order_foods.o_id')
            ->join('foods', 'foods.id', '=', 'order_foods.f_id')
            ->join('restaurants', 'restaurants.id', '=', 'foods.r_id')
            ->join('addresses', 'addresses.id', '=', 'orders.a_id')
            ->join('users', 'users.id', '=', 'addresses.u_id')
            ->where('orders.id', '=', $orderID)
            ->first();
            $jsonOut = json_encode( $orders1);
           return $jsonOut;
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
    private function getIfOngoing(){
        $data=[];

        $orders1 = DB::table('orders')->select([
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
        ->join('order_foods', 'orders.id', '=', 'order_foods.o_id')
        ->join('foods', 'foods.id', '=', 'order_foods.f_id')
        ->join('restaurants', 'restaurants.id', '=', 'foods.r_id')
        ->join('addresses', 'addresses.id', '=', 'orders.a_id')
        ->join('users', 'users.id', '=', 'addresses.u_id')
        ->where('orders.c_id', '=', Auth::user()->id)
        ->get();
        foreach ( $orders1 as  $order) {
            array_push($data, $order );
        }

            return $data;
    }
    public function ongoingDelivery()
    {
        $result = app('App\Http\Controllers\CurierController')->getIfOngoing();
        if ($result) {
            return view('curierDash')->with('data', ['windowType'=> 2,'order'=> $result]);
        }else
        {
            return redirect("/Dashboard/Courier");
        }

    }
    public function UpdateDelivery(Request $request)
    {
        error_log($request->completed);
        $orderID=$request->orderID;
        $courierID=Auth::user()->id;
        $trans=false;
        if ($request->completed==1) {
            error_log("miafasz");
            $trans = DB::transaction(function() use ($orderID, $courierID){
                if(DB::table('orders')
                ->where('id', $orderID)
                ->where('c_id' , $courierID)
                ->update(['o_status' => 3])>0
                )
                {
                    return(true);
                }else {
                    return(false);
                }
            });
        }else
        {
            $trans = DB::transaction(function() use ($orderID){
                if(DB::table('orders')
                    ->where('id', $orderID)
                    ->update(['c_id' => null,'o_status' => 1])>0
                )
                {
                    return(true);
                }else {
                    return(false);
                }

            });
        }

       error_log($trans);
       if ($trans) {
           return("Ok");
       }else
       {
           return("notOk");
       }



    }
}
