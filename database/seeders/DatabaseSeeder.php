<?php

namespace Database\Seeders;

use App\Modules\User\Database\Seeders\SeedFakeMobilityTableSeeder;
use App\Modules\User\Database\Seeders\UserSeeder;
use App\Modules\User\Entities\User;
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
        $this->call([
            UserSeeder::class,
            SeedFakeMobilityTableSeeder::class
        ]);
    }
}
