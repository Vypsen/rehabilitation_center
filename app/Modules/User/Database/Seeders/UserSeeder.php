<?php

namespace App\Modules\User\Database\Seeders;

use App\Modules\User\Entities\Mobility;
use App\Modules\User\Entities\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->delete();
        User::factory(random_int(10,30))->create();
    }
}
