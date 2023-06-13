<?php

namespace App\Modules\Admin\Database\Seeders;

use App\Modules\Admin\Entities\Admin;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SeedFakeAdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::unguard();
        Admin::query()->delete();

        /** @var Generator $faker */
        $faker = app(Generator::class);

        $my = new Admin();
        $my->name = "Сергей";
        $my->lastname = "Семенец";
        $my->midname = "Олегович";
        $my->bdate = "2001-04-20";
        $my->number_phone = "+79241506156";
        $my->gender = "М";
        $my->email = "s.semenets2002@mail.ru";
        $my->email_verified_at = now();
        $my->password = bcrypt('123');

        $my->save();
    }
}
