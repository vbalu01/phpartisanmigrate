<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $counter = 0;

        $nevek = [
            "Solo Restaurant",
            "Hangya Étterem Csepreg",
            "Pizza Capella",
            "Bécsikapu Étterem",
            "Kékfény Étterem és Pizzéria",
            "Boszorkánykonyha",
            "KFC Szombathely",
            "Burger King Sopron",
            "Jégverem Fogadó",
            "McDonald's Szombathely főtér",
            "McDonald's 2 Szombathely",
            "Moslék étterem"
        ];
        $emailek = [
            "solosopron@email.hu",
            "hangyacsepreg@email.hu",
            "capella@email.hu",
            "becsikapu@email.hu",
            "kekfeny@email.hu",
            "boszi@email.hu",
            "kfc@email.hu",
            "bk@email.hu",
            "jegverem@email.hu",
            "meki1@email.hu",
            "meki2@emai.hu",
            "mosleketterem@etterem.hu"
        ];

        $cimek = [
            "Sopron, Lackner Kristóf u. 31",
            "Csepregen belül idk hol, nem mintha nagy város lenne",
            "Sopron, Patak u. 45",
            "Kőszeg, Rajnis u. 5",
            "Kőszeg, Várkör 25",
            "Kőszeg, Jurisics tér 13",
            "Szombathely, Zanati út 70",
            "Sopron, Határdomb út 1-3",
            "Sopron, Jégverem u. 1",
            "Szombathely, Fő tér 29",
            "Szombathely, Kéthly Anna u. 7",
            "Sopron, Moslék u. 1."

        ];

        $irszamok = [
            9400,
            9735,
            9400,
            9730,
            9730,
            9730,
            9700,
            9400,
            9400,
            9700,
            9700,
            9400

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
            1,
            1,
            1,
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
            'r_name'=>$nevek[$counter],
            'password'=>$hash,
            'address'=>$cimek[$counter],
            'city_postalcode'=>$irszamok[$counter],
            'available'=>$status[$counter++],
        ];

    }
}
