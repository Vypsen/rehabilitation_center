<?php

namespace App\Modules\Patient\Database\Seeders;

use App\Modules\Doctor\Entities\Doctor;
use App\Modules\Patient\Entities\Patient;
use Faker\Generator;
use Illuminate\Database\Seeder;

class SeedFakePatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Generator $faker */
        $faker = app(Generator::class);

        Patient::unguard();
        Patient::query()->delete();

        $my = new Patient();
        $my->name = "Сергей";
        $my->lastname = "Семенец";
        $my->midname = "Олегович";
        $my->bdate = "2001-04-20";
        $my->number_phone = "+79241506156";
        $my->gender = "М";
        $my->email = "s.semenets2001@mail.ru";
        $my->password = bcrypt('123');
        $my->doctor_id = $faker->randomElement(Doctor::query()->pluck('id')->toArray());
        $my->save();

        Patient::factory(random_int(15, 30))->create();
    }
}
