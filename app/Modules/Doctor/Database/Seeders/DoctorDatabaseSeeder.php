<?php

namespace App\Modules\Doctor\Database\Seeders;

use App\Modules\Doctor\Entities\Doctor;
use App\Modules\Patient\Entities\Patient;
use Doctrine\DBAL\Schema\Table;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DoctorDatabaseSeeder extends Seeder
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

        Doctor::unguard();
        Doctor::query()->delete();
        \DB::table('doctors_patients')->delete();

        $my = new Doctor();
        $my->name = "Сергей";
        $my->lastname = "Семенец";
        $my->midname = "Олегович";
        $my->bdate = "2001-04-20";
        $my->post = "тест пост";
        $my->number_phone = "+79241506156";
        $my->gender = "М";
        $my->email_verified_at = now();
        $my->email = "s.semenets2003@mail.ru";
        $my->password = bcrypt('123');

        $my->save();

        Doctor::factory(random_int(10, 30))->create();

        $patientsIds = Patient::query()->get('id');
        foreach (Doctor::all() as $doc) {
            for ($j = 0; $j < random_int(2, 5); ++$j) {
                $doc->patients()->save($patientsIds->random());
            }
        }
        foreach (Doctor::all() as $doc) {
            foreach ($doc->patients as $pat) {
                $pat->pivot->comment = $faker->text();
                $pat->pivot->created_at = now();
                $pat->pivot->save();
            }
        }

    }


}
