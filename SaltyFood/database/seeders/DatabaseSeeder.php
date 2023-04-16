<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Users::factory(7)->create();
        \App\Models\restaurants::factory(12)->create();
        \App\Models\categories::factory(8)->create();
        \App\Models\couriers::factory(10)->create();
        \App\Models\addresses::factory(12)->create();
        \App\Models\foods::factory(60)->create();
    }
}
