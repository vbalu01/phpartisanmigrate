<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $counter = 0;

        $emailek = ["b0xupt@inf.elte.hu", "teszt1@teszt.hu", "teszt2@teszt.hu", "teszt3@teszt.hu","teszt4@teszt.hu","teszt5@teszt.hu","teszt6@teszt.hu"];

        $prefix = '$2y$';
        $cost = '10';
        $salt = '$thisisahardcodedsalt$';
        $blowfishPrefix = $prefix.$cost.$salt;
        $password = 'palinka';
        $hash = crypt($password, $blowfishPrefix);

        $nevek = ["Bass-Vorváth Halázs", "Kába Risztián", "Mаркай Xартин", "teszt1","teszt2","teszt3","teszt4"];
        $status = [1, 1, 0, 0,0,1,1];

        return [
            'email' => $emailek[$counter],
            'password'=>$hash,
            'u_fullname'=>$nevek[$counter],
            'available'=>$status[$counter++],
        ];




    }
}
