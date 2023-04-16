<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $counter = 0;

        $felh_az = [
            1,
            1,
            2,
            3,
            4,
            5,
            6,
            6,
            7,
            7,
            2,
            2

        ];

        $azon_nev = [
            "Otthon",
            "Incidens Kar",
            "Munkahely",
            "Otthon",
            "Otthon",
            "AZ iskola",
            "Incidens Kar",
            "AZ iskola",
            "Incidens Kar",
            "AZ iskola",
            "Csak mert vicces",
            "Cím1"
        ];
        $irszam = [
            9400,
            9700,
            9027,
            2347,
            9796,
            9735,
            9700,
            9735,
            9700,
            9735,
            8419,
            9096
        ];
        $cim = [
            "9400 Sopron, Lackner Kristóf u. 35.",
            "9700 Szombathely, Károlyi Gáspár tér 4.",
            "9027 Győr, Budai út 1.",
            "2347 Bugyi, Rózs u. 1",
            "9796 Pornóapáti, Körmendi u.1",
            "9735 Csepreg, Rákóczi Ferenc utca 13",
            "9700 Szombathely, Károlyi Gáspár tér 4.",
            "9735 Csepreg, Rákóczi Ferenc utca 13",
            "9700 Szombathely, Károlyi Gáspár tér 4.",
            "9735 Csepreg, Rákóczi Ferenc utca 13",
            "8419 Csesznek, Várhegyköz 1.",
            "9096 Nyalka, Rákóczi út 1."

        ];
        $tel = [
            "36101234567",
            "36202345678",
            "36103456789",
            "36206437357",
            "36106567465",
            "36202345678",
            "36101234567",
            "36205246345",
            "36104263572",
            "36205321425",
            "36302342452",
            "36706544357"


        ];

        $status = [
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            0,
            1
        ];
        $megj = [
            "Szia",
            "",
            "",
            "ASDF",
            "",
            "",
            "Reptééér",
            "",
            "",
            "",
            "404",
            ""
            ];
        $prefix = '$2y$';
        $cost = '10';
        $salt = '$thisisahardcodedsalt$';
        $blowfishPrefix = $prefix.$cost.$salt;
        $password = 'palinka';
        $hash = crypt($password, $blowfishPrefix);

        $nevek = ["Bass-Vorváth Halázs", "Kába Risztián", "Mаркай Xартин", "teszt1","teszt2","teszt3","teszt4"];


        return [
            'u_id' => $felh_az[$counter],
            'a_name' => $azon_nev[$counter],
            'city_id'=>$irszam[$counter],
            'address'=>$cim[$counter],
            'phone'=>$tel[$counter],
            'available'=>$status[$counter],
            'other'=>$megj[$counter++],
        ];

    }
}
