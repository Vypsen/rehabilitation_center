<?php

namespace App\Modules\Patient\Database\Seeders;

use App\Modules\Patient\Entities\Patient;
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

        $my->save();

        Patient::factory(random_int(10, 30))->create();
    }
}
