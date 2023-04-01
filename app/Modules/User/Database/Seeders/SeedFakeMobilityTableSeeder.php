<?php

namespace App\Modules\User\Database\Seeders;

use App\Modules\User\Entities\Mobility;
use App\Modules\User\Entities\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SeedFakeMobilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mobility::query()->delete();
        /** @var Generator $faker */
        $faker = app(Generator::class);
        $usersIds = User::query()->get()->all();

        for ($i = 0; $i < count($usersIds); $i++) {
            $mobility = new Mobility();

            $mobility->id_user = $usersIds[$i]->id;
            $mobility->lying_turn = fake()->boolean();
            $mobility->sits_down = fake()->boolean();
            $mobility->sits = fake()->boolean();
            $mobility->gets_up = fake()->boolean();
            $mobility->to_stand = fake()->boolean();
            $mobility->get_up_sits_down = fake()->boolean();
            $mobility->helps_walking_room = fake()->boolean();
            $mobility->stairwell = fake()->boolean();
            $mobility->walking_street = fake()->boolean();
            $mobility->walking_room = fake()->boolean();
            $mobility->raise_item = fake()->boolean();
            $mobility->walks_gravel = fake()->boolean();
            $mobility->washes = fake()->boolean();
            $mobility->ladder = fake()->boolean();
            $mobility->running = fake()->boolean();

            $mobility->save();
        }
    }
}
