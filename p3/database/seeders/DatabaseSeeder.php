<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(DramaTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
    }
}
