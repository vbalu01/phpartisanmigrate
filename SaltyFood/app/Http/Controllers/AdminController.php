<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function updateFood(Request $request)
    {
        if($request->has('food_id') && $request->has('f_name') && $request->has('c_id') && $request->has('description') && $request->has('price') && $request->has('img_src') && $request->has('available')){
            if(DB::table('foods')->where('id', $request->input('food_id'))->update([
                'f_name' => $request->input('f_name'),
                'c_id' => $request->input('c_id'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'available' => $request->input('available'),
                'img_src' => $request->input('img_src')
            ]) == 1){
                return "Sikeres módosítás!";
            }else{
                return "Nem történt módosítás!";
            }
        }else{
            return "Hiányos adatok!";
        }
    }

    public function addFood(Request $request)
    {
        if($request->has('f_name') && $request->has('r_id') && $request->has('c_id') && $request->has('description') && $request->has('price') && $request->has('img_src') && $request->has('available'))
        {
            $id = DB::table('foods')->insertGetId([
                'f_name' => $request->input('f_name'),
                'r_id' => $request->input('r_id'),
                'c_id' => $request->input('c_id'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'available' => $request->input('available'),
                'img_src' => $request->input('img_src')
            ]);

            if($id != null && $id != 0){
                return ['Success' => true, 'Message' => "Sikeres módosítás", 'id' => $id];
            }else{
                return ['Success' =>false, 'Message' => "Ismeretlen hiba történt!"];
            }
        }else{
            return ['Success' => false, "Message" => "Sikertelen: Hibás beviteli adatok!"];
        }
    }

    public function updateCourierStatus(Request $request) //Csak futárra
    {
        if($request->has('id')){
            $actual = DB::table('couriers')->select('available')->where('id', $request->input('id'))->first()->available;
            
            if(DB::table('couriers')->where('id', $request->input('id'))->update([
                'available' => !$actual
            ]) == 1){
                return ['Success' => true, 'Message' => "Sikeres módosítás"];
            }else{
                return ['Success' => false, 'Message' => "Nem történt módosítás!"];
            }
        }
    }

    public function addNewCategory(Request $request)
    {
        if($request->has('c_name')) {
            $id = DB::table('categories')->insertGetId([
                'c_name' => $request->input('c_name'),
                'available' => true
            ]);

            return ['success' => true, 'message' => "Sikeres rögzítés!", 'id' => $id];

        } else {
            return ['success' => false, 'message' => "Hibás adatok!"];
        }
    }

    public function updateCategory(Request $request)
    {
        if($request->has('c_id')){
            if(DB::table('categories')->where('id', $request->input('c_id'))->update([
                'c_name' => $request->input('c_name'),
                'available' => $request->input('available')
            ]) == 1){
                return "Sikeres mentés!";
            }else{
                return "Nem történt módosítás!" ;
            }
        }else{
            return "Hiba történt!";
        }
    }
}
