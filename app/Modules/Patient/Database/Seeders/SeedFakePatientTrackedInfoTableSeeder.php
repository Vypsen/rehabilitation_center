<?php

namespace App\Modules\Patient\Database\Seeders;

use App\Modules\Patient\Entities\Patient;
use App\Modules\Patient\Entities\TrackedInfoPatient;
use DB;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SeedFakePatientTrackedInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TrackedInfoPatient::unguard();
        TrackedInfoPatient::query()->delete();

        /** @var Generator $faker */
        $faker = app(Generator::class);

        $patients = Patient::getAllPatients();

        for ($i = 0; $i < count($patients); ++$i) {
            $pTrackedInfo = new TrackedInfoPatient();

            $pTrackedInfo->patient_id = $patients[$i]->id;
            $pTrackedInfo->hand_tactility = $faker->boolean();
            $pTrackedInfo->hand_t = $faker->boolean();
            $pTrackedInfo->hand_pain = $faker->boolean();
            $pTrackedInfo->hand_musculoskeletal_feeling = $faker->boolean();

            $pTrackedInfo->leg_tactility = $faker->boolean();
            $pTrackedInfo->leg_t = $faker->boolean();
            $pTrackedInfo->leg_pain = $faker->boolean();
            $pTrackedInfo->leg_musculoskeletal_feeling = $faker->boolean();

            $pTrackedInfo->type_disorder = $faker->randomElement(['Двигательные', "Чувствительные"]);
            $pTrackedInfo->memory_loss = $faker->randomElement(['Отсутствует', "Кратковременная", "Долговременная"]);
            $pTrackedInfo->orientation = $faker->randomElement(['В норме', "Нарушенна в пространстве", "Нарушенна во времени"]);
            $pTrackedInfo->edema = $faker->text(100);

            $pTrackedInfo->shortness = $faker->boolean();
            $pTrackedInfo->cough = $faker->boolean();
            $pTrackedInfo->asthma = $faker->boolean();
            $pTrackedInfo->smoking = $faker->boolean();

            $pTrackedInfo->sleep_count = $faker->numberBetween(1, 24);
            $pTrackedInfo->insomnia = $faker->boolean();
            $pTrackedInfo->sedatives = $faker->boolean();

            $pTrackedInfo->SRM = $faker->randomElement(DB::table('SRM_descr')->pluck('point')->toArray());

            $pTrackedInfo->save();
        }
    }
}
