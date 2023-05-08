<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
