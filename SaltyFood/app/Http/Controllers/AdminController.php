<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function updateFood(Request $request)
    {
        if($request->has('food_id') && $request->has('f_name') && $request->has('c_id') && $request->has('description') && $request->has('price') && $request->has('img_src') && $request->has('available')){
            DB::table('foods')->where('id', $request->input('food_id'))->update([
                'f_name' => $request->input('f_name'),
                'c_id' => $request->input('c_id'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'available' => $request->input('available'),
                'img_src' => $request->input('img_src')
            ]);
        }
    }

    public function addFood(Request $request)
    {
        if($request->has('food_id') && $request->has('r_id') && $request->has('f_name') && $request->has('c_id') && $request->has('description') && $request->has('price') && $request->has('img_src') && $request->has('available'))
        {
            DB::table('foods')->insert([
                'f_name' => $request->input('f_name'),
                'r_id' => $request->input('r_id'),
                'c_id' => $request->input('c_id'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'available' => $request->input('available'),
                'img_src' => $request->input('img_src')
            ]);
        }
    }

    public function updateRegisterStatus(Request $request)
    {
        if($request->has('type') && $request->has('available') && $request->has('id')){
            if($request->input('type') == 0) //Étterem
            {
                DB::table('restaurants')->where('id', $request->input('id'))->update([
                    'available' => $request->input('available')
                ]);
            }
            else if($request->input('type') == 1)//Futár
            {
                DB::table('couriers')->where('id', $request->input('id'))->update([
                    'available' => $request->input('available')
                ]);
            }
        }
    }

    public function addCetegory(Request $request)
    {
        if($request->has('c_name')){
            DB::table('categories')->insert([
                'c_name' => $request->input('c_name'),
                'available' => true
            ]);
        }
    }

    public function updateCategory(Request $request)
    {
        if($request->has('c_id')){
            DB::table('categories')->where('id', $request->input('c_id'))->update([
                'c_name' => $request->input('c_name'),
                'available' => $request->input('available')
            ]);
        }
    }
}
