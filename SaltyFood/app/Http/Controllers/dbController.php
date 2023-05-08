<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dbController extends Controller
{
    public function teszt()
    {
        
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
}
