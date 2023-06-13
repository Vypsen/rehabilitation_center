<?php

namespace App\Modules\Patient\Database\Seeders;

use App\Modules\Patient\Entities\GeneralInfoPatient;
use App\Modules\Patient\Entities\Patient;
use Faker\Generator;
use Illuminate\Database\Seeder;

class SeedFakePatientGeneralInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralInfoPatient::unguard();
        GeneralInfoPatient::query()->delete();

        /** @var Generator $faker */
        $faker = app(Generator::class);

        $patients = Patient::getAllPatients();

        for ($i = 0; $i < count($patients); ++$i) {
            $pInfo = new GeneralInfoPatient();

            $pInfo->patient_id = $patients[$i]->id;
            $pInfo->disease_date = $faker->dateTimeBetween($patients[$i]->bdate, now());
            $pInfo->visit_date = $faker->dateTimeBetween($pInfo->disease_date, now());
            $pInfo->address = $faker->address();
            $pInfo->relatives_info = $faker->text();
            $pInfo->height = $faker->numberBetween(100, 200);
            $pInfo->weight = $faker->numberBetween(30, 150);
            $pInfo->type_body = $faker->word();
            $pInfo->disease = $faker->text(50);
            $pInfo->extra_disease = $faker->text(100);
            $pInfo->allergy = $faker->text();
            $pInfo->glucose = $faker->numberBetween(0, 50);
            $pInfo->blood_pressure = $faker->text(10);
            $pInfo->Ps = $faker->numberBetween(0, 50);
            $pInfo->SpO = $faker->numberBetween(0, 50);
            $pInfo->diabetes = $faker->randomElement(['Отсутствует', "Первичный", "Вторичный"]);
            $pInfo->dysphasia = $faker->randomElement(['Отсутствует', "Сенсерная", "Моторная", "Дизартрия"]);
            $pInfo->visual_or_sensory_extinction = $faker->randomElement(['Отсутствует', "Зрительное", "Сенсерное", "Присутствуют оба"]);
            $pInfo->swallowing = $faker->randomElement(['Способен', "Не способен"]);
            $pInfo->talk = $faker->randomElement(['Нет', "Есть"]);
            $pInfo->anxiety = $faker->randomElement(['Нет', "Есть"]);
            $pInfo->cardio_system = $faker->randomElement(['Без патологий', "АГ", "ИБС", "Фибрилляция предсердий"]);
            $pInfo->stents = $faker->boolean();
            $pInfo->cardiostimulator = $faker->boolean();
            $pInfo->pain_place = $faker->text(40);
            $pInfo->pain_periodicity = $faker->text(40);
            $pInfo->skin_damage = $faker->boolean();
            $pInfo->skin_damage_place = $faker->text(40);
            $pInfo->urine_incontinence = $faker->boolean();
            $pInfo->frequent_urination = $faker->boolean();
            $pInfo->nikturia_count = $faker->numberBetween(0, 10);
            $pInfo->urinary_catheter = $faker->boolean();
            $pInfo->rep_urinary_infection = $faker->boolean();
            $pInfo->urine_features = $faker->text(40);
            $pInfo->excrement_incontinence = $faker->boolean();
            $pInfo->defecation_count = $faker->numberBetween(0, 10);
            $pInfo->laxative = $faker->boolean();
            $pInfo->laxative_count = $faker->numberBetween(0, 10);
            $pInfo->laxative_name = $faker->text(40);

            $pInfo->save();

        }
    }
}
