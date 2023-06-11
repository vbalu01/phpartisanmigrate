<?php

namespace App\Http\Controllers;

use App\Models\PushSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;

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
        elseif(Auth::guard('user')->check()){
            return redirect("/Dashboard/User");
        }
    }




    public function restaurantDash(Request $request)
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


    public function insertMenuForm(){

        $addresses = DB::table('addresses')->select(['id', 'a_name'])->get();
        $tmp_r = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->get();
            $tmp_f = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price', 'img_src'])->where([['available', '=', true]])->get();
            $tmp_g = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->get();
        return view('menu_create')->with('data', ['addresses' => $addresses, 'restaurants' => $tmp_r, 'foods' => $tmp_f,'restaurants' => $tmp_r, 'categories' => $tmp_g]);
    }

    public function insertFood(Request $request){

            //id int [PK, not null]
        //r_id int [NOT NULL, ref: > app.restaurants.id]
        //f_name varchar [not null]
        //c_id int [NOT NULL, ref: > app.categories.id]
        //description varchar
        //price int [NOT NULL]
        //available boolean [NOT NULL]
        $r_id = $request->input('r_id');
        $f_name = $request->input('f_name');
        $c_id = $request->input('c_id');
        $description  = $request->input('description');
        $price = $request->input('price');
        $available= $request->input('available');
        $data=array('r_id'=>$r_id,"f_name"=>$f_name,"c_id"=>$c_id,"description"=>$description,"price"=>$price,"available"=>$available);
        DB::table('foods')->insert($data);
        echo "Az étel sikeresen felvéve!";
        header( "refresh:3;url=/" );
       // echo '<a href = "/insert">Click Here</a> to go back.';
        }




        public function editRestaurantForm($id) {

        // $addresses = DB::table('addresses')->select(['id', 'a_name'])->get();
            //$tmp_r = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->get();
            $tmp_name = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['id', '=', $id]])->get();

        // $tmp_f = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price', 'img_src'])->where([['available', '=', true]])->get();
        // $tmp_g = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->get();

            return view('restaurant_update', ['restaurants' =>$tmp_name, 'id' => $id]);
    }

    public function editOrderForm($id) {

        $addresses = DB::table('addresses')->select(['id', 'a_name'])->get();
        $couriers = DB::table('couriers')->select(['id', 'c_name'])->get();
        //$tmp_r = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->get();
        $tmp_name = DB::table('orders')->select(['id', 'c_id', 'a_id', 'o_date', 'o_status', 'payment_method', 'full_price'])->where([['id', '=', $id]])->get();

        // $tmp_f = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price', 'img_src'])->where([['available', '=', true]])->get();
        // $tmp_g = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->get();

        return view('order_update', ['orders' =>$tmp_name,'addresses' =>$addresses, 'couriers' => $couriers, 'id' => $id]);
    }


    public function editRestaurant(Request $request,$id) {
        $r_name = $request->input('r_name');
        $email = $request->input('email');
        $password = $request->input('password');
        $address = $request->input('address');
        $available = $request->input('available');
        DB::update('update restaurants set r_name = ?, email = ?, password = ?, address = ?, available = ?  where id = ?',[$r_name,$email,$password,$address,$available,$id]);
        echo "Étterem sikeresen frissítve!.<br/>";
        header( "refresh:3;url=/" );
    }

    public function editOrder(Request $request,$id)
    {
        //id int [PK, increment]
            //c_id INT [ref: > app.couriers.id]
            // a_id INT [ref: > app.addresses.id]
            //   o_date datetime [NOT NULL]
            //   o_status int [NOT NULL]
            //   payment_method int [NOT NULL]
            //   full_price int [NOT NULL]

        $c_id = $request->input('c_id');
        $a_id = $request->input('a_id');
        $o_date = $request->input('o_date');
        $o_status = $request->input('o_status');
        $payment_method = $request->input('payment_method');
        $full_price = $request->input('full_price');
        DB::update('update orders set c_id= ?, a_id = ?, o_date = ?, o_status = ?, payment_method = ?, full_price = ?  where id = ?',[$c_id,$a_id,$o_date,$o_status,$payment_method,$full_price,$id]);
        echo "Rendelés sikeresen frissítve!.<br/>";
        header( "refresh:3;url=/" );
    }


    public function adminUpdateMenuPage(Request $request, $id)
    {
        $loggedin = false;
        $allowedtoOrder=false;
        $usermail = "";
        if (Auth::user()!=null) {
            $loggedin = true;
            $usermail = Auth::user()->email;
        }
        if(DB::table('restaurants')->select('id')->where('id', $id)->value('id') != $id){ //Azaz nincs ilyen étterem
            abort(404);
        }

        $restaurantName = DB::table('restaurants')->select('r_name')->where('id', $id)->value('r_name');
        $foods = DB::table('foods')->select('id', 'f_name', 'c_id', 'description', 'price', 'available', 'img_src')->where('r_id', $id)->get();
        $categories = DB::table('categories')->select('id', 'c_name')->where('available', true)->get();

        return view('adminMenuPage')->with('data', [
            'loggedIn' => $loggedin,
            'usermail' => $usermail,
            'allowedToOrder' => $allowedtoOrder,
            'r_name' => $restaurantName,
            'r_id' => $id,
            'foods' => $foods,
            'categories' => $categories
        ]);
    }

    public function notifyEveryone() {
        //eznekemkell
        // "publicKey" => "BDXLfLM4pXv3_ChmODNsXTk7E6YR8ZSE9lXe3XMWmjiI_9GQTrsoJeZq0Htzv3pnoBrq0g5iGOsvMaXJBXG5Gjk"
        //"privateKey" => "eqB3I-E5sD3j-y0LQy2HznrLBjYceKE15SG5fhZfKxA"
        $SubbedClients=PushSubscription::all();
        foreach ($SubbedClients as $value) {
           $webPush=new WebPush([
            "VAPID"=>[
                        "publicKey" => "BDXLfLM4pXv3_ChmODNsXTk7E6YR8ZSE9lXe3XMWmjiI_9GQTrsoJeZq0Htzv3pnoBrq0g5iGOsvMaXJBXG5Gjk",
                        "privateKey" => "eqB3I-E5sD3j-y0LQy2HznrLBjYceKE15SG5fhZfKxA",
                        "subject"=>"http://127.0.0.1/Dashboard",
                    ]
            ]);
            $array = array(
                "title" => "Új rendelés elérhető",
                "body" => "Elfogadáshoz kattints ide",
                "url" => route('futarDash'),
            );
           $result= $webPush->sendOneNotification(
                Subscription::create(json_decode($value->data,true)),
                json_encode($array)
            );
            error_log("notificatin Sent");
        }
    }

    function userDash() {
        $loggedin = false;
        $allowedtoOrder=true;
        $usermail = "";
        if (Auth::user()!=null) {
            $loggedin = true;
            $usermail = Auth::user()->email;
        }

        $addresses = DB::table('addresses')->select('id', 'a_name', 'city_id', 'address', 'phone', 'available', 'other')->where('u_id', Auth::user()->id)->get();

        return view('userDash')->with('data', [
            'loggedIn' => $loggedin,
            'usermail' => $usermail,
            'userId' => Auth::user()->id,
            'allowedToOrder' => $allowedtoOrder,
            'addresses' => $addresses
        ]);
    }
}
