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
        // mambuat data random sebanyak 30 lalu db:seed
         \App\Models\User::factory(30)->create();
    }
}
