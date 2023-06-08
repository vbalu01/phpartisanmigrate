<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class dbController extends Controller
{
    public function teszt()
    {
        return csrf_token();
    }

    public function getAllRestaurants()
    {
        $tmp = DB::table('restaurants')->select(['id', 'email', 'r_name', 'address', 'city_postalcode'])->where([['available', '=', true]])->get();
        return View('tesco', ['data' => $tmp]);
    }

    public function getFoodsByRestaurant(Request $request) //restaurant -> Étterem id
    {
        $tmp = DB::table('foods')->select(['id', 'c_id', 'f_name', 'description', 'price'])->where([['available', '=', true], ['r_id', '=', $request['restaurant']]])->get();
        return View('tesco', ['data' => $tmp]);
    }

    public function getFoodsByCategory(Request $request) //category -> Kategória id
    {
        $tmp = DB::table('foods')->select(['id', 'r_id', 'f_name', 'description', 'price'])->where([['available', '=', true], ['c_id', '=', $request['category']]])->get();
        return View('tesco', ['data' => $tmp]);
    }

    public function getCategories()
    {
        $tmp = DB::table('categories')->select(['id', 'c_name'])->where([['available', '=', true]])->get();
        return View('tesco', ['data' => $tmp]);
    }

    public function getAllFoods()
    {
        $tmp = DB::table('foods')->select(['id', 'r_id', 'f_name', 'c_id', 'description', 'price'])->where([['available', '=', true]])->get();
        return View('tesco', ['data' => $tmp]);
    }

    public function getAllOrders()
    {
        $tmp = DB::table('orders')->select(['id', 'c_id', 'a_id', 'o_date', 'o_status', 'payment_method', 'full_price'])->where([['available', '=', true]])->get();
        return View('tesco', ['data' => $tmp]);
    }

    public function addNewFood(Request $request){
        if($request->has('r_id') && $request->has('f_name') && ($request->has('c_id') && is_numeric($request->input('c_id'))) && $request->has('description') && ($request->has('price') && is_numeric($request->input('price')))){ //Beérkező adatok meglétének ellenőrzése
            //Ha admin, vagy adott étterem ellenőrzés, ha admin +étterem létezés ellenőrzés
            if((int)$request->input('price') < 0){//Még az étterem fizet hogy náluk egyél? Olyan nekem is kéne
                //...
                return 'Én is kérek ingyen kaját';
            }else{
                //Kategória létezésének ellenőrzése
                DB::table('foods')->insert([
                    'r_id' => $request->input('r_id'),
                    'f_name' => $request->input('f_name'),
                    'c_id' => $request->input('c_id'),
                    'description' => $request->input('description'),
                    'price' => (int)$request->input('price'),
                    'available' => true
                ]);
                return 'Asszem sikerült';
            }
        }else{ //Nem érkezett meg minden adat
            return 'Elbasztad';
        }
    }

    public function addNewCategory(Request $request){
        if($request->has('c_name')){ //Beérkező OK

        }else{ //Hiányos adatok

        }
    }

    public function addNewAddress(Request $request){
        if($request->has('u_id') && $request->has('a_name') && $request->has('city_id') && $request->has('address') && $request->has('phone')){//Adat ellenőrzés, other opcionális

        }else{//Nem érkezett meg minden adat

        }
    }
    
    public function getShoppingCartData(Request $request){
        $receivedData = json_decode($request->data);

        $returnData = [];

        foreach ($receivedData as $data) {
            $tmp = DB::table('foods')->select(['id', 'f_name', 'description', 'price', 'img_src'])->where([['id', '=', $data->id]])->first();
            array_push($returnData, $tmp);
        }
        
        return json_encode($returnData);
    }

    public function completeOrder(Request $request)
    {
        $foods = json_decode($request->foods);
        $addressId = $request->addressId;
        $paymentMethod = $request->paymentMethod;

        if(count($foods) < 1 || $addressId == null || $paymentMethod == null){
            return ["Status" => "Hiba", "Reason" => "BadData"];
        }

        try {
            $order = DB::transaction(function() use ($foods, $addressId, $paymentMethod){
                $full_price = 0;
                foreach($foods as $food){
                    $full_price += $food->count * DB::table('foods')->select('price')->where([['id', '=', $food->id]])->first()->price;
                }

                $order = DB::table('orders')->insertGetId(['a_id' => $addressId, 'o_date' => date('Y-m-d H:i:s'), 'o_status' => 0, 'payment_method' => $paymentMethod, 'full_price' => $full_price]);
                
                foreach($foods as $food){
                    DB::table('order_foods')->insert(['f_id' => $food->id, 'o_id' => $order, 'count' => $food->count]);
                }

                return $order;
            });
            return ["Status" => "Ok", "OrderId" => $order];
        } catch(Exception $e){
            return ["Status" => "Hiba", "Reason" => $e];
        }
    }
}
