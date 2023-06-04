<?php

namespace App\Modules\Patient\Database\Seeders;

use App\Modules\Patient\Entities\Patient;
use App\Modules\Patient\Entities\Skills;
use Faker\Generator;
use Illuminate\Database\Seeder;

class SeedFakePatientSkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skills::unguard();
        Skills::query()->delete();

        /** @var Generator $faker */
        $faker = app(Generator::class);

        $patients = Patient::getAllPatients();

        for ($i = 0; $i < count($patients); ++$i) {
            $pSkills = new Skills();
            $pSkills->patient_id = $patients[$i]->id;

            $pSkills->lying_turn = $faker->boolean();
            $pSkills->sits_down = $faker->boolean();
            $pSkills->sits = $faker->boolean();
            $pSkills->gets_up = $faker->boolean();
            $pSkills->to_stand = $faker->boolean();
            $pSkills->get_up_sits_down = $faker->boolean();
            $pSkills->helps_walking_room = $faker->boolean();
            $pSkills->stairwell = $faker->boolean();
            $pSkills->walking_street = $faker->boolean();
            $pSkills->walking_room = $faker->boolean();
            $pSkills->raise_item = $faker->boolean();
            $pSkills->walks_gravel = $faker->boolean();
            $pSkills->washes = $faker->boolean();
            $pSkills->ladder = $faker->boolean();
            $pSkills->running = $faker->boolean();

            $pSkills->save();
        }
    }
}
