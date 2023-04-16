<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CouriersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $counter = 0;
        $emailek = [
            "futar1@email.hu",
            "futar2@emai.hu",
            "futar3@email.hu",
            "futar4@emai.hu",
            "futar5@email.hu",
            "futar6@emai.hu",
            "futar7@email.hu",
            "futar8@emai.hu",
            "futar9@email.hu",
            "futar10@emai.hu"
        ];
        $nevek = [
            "Futár 1",
            "Futár 2",
            "Futár 3",
            "Futár 4",
            "Futár 5",
            "Futár 6",
            "Futár 7",
            "Futár 8",
            "Futár 9",
            "Futár 10"

        ];
        $status = [
            1,
            1,
            1,
            0,
            1,
            1,
            1,
            1,
            0,
            1
        ];

        $prefix = '$2y$';
        $cost = '10';
        $salt = '$thisisahardcodedsalt$';
        $blowfishPrefix = $prefix.$cost.$salt;
        $password = 'palinka';
        $hash = crypt($password, $blowfishPrefix);




        return [
            'email' => $emailek[$counter],
            'password'=>$hash,
            'c_name'=>$nevek[$counter],
            'available'=>$status[$counter++],
        ];



    }
}
