<?php

namespace Database\Seeders;

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
        User::query()->delete();
        User::factory(random_int(10,30))->create();
    }
}
