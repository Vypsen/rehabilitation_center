<?php

namespace App\Modules\Doctor\Database\Seeders;

use App\Modules\Doctor\Entities\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DoctorsPatientsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::unguard();
        Doctor::query()->delete();

        $my = new Doctor();
        $my->name = "Сергей";
        $my->lastname = "Семенец";
        $my->midname = "Олегович";
        $my->bdate = "2001-04-20";
        $my->post = "тест пост";
        $my->number_phone = "+79241506156";
        $my->gender = "М";
        $my->email = "s.semenets2003@mail.ru";
        $my->password = bcrypt('123');

        $my->save();

        Doctor::factory(random_int(10, 30))->create();
    }
}
