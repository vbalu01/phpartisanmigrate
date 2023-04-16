<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $counter = 0;

        $cat = [
            "Pizzák",
            "Tészták",
            "Magyaros ételek",
            "Főzelékek",
            "Levesek",
            "Desszertek",
            "Hamburgerek",
            "Ehetetlen moslékok"

           ];


        $status = [1, 1,1, 1,1,1,1,1];

        return [
            'c_name'=>$cat[$counter],
            'available'=>$status[$counter++],
        ];

    }
}
