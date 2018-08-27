<?php

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
        // https://laravel.com/docs/5.6/seeding
        factory('App\Product', 10)->create();
    }
}
