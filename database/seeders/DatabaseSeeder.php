<?php

namespace Database\Seeders;

use App\Modules\Admin\Database\Seeders\SeedFakeAdminsTableSeeder;
use App\Modules\Doctor\Database\Seeders\DoctorDatabaseSeeder;
use App\Modules\Patient\Database\Seeders\SeedFakePatientGeneralInfoTableSeeder;
use App\Modules\Patient\Database\Seeders\SeedFakePatientSkillsTableSeeder;
use App\Modules\Patient\Database\Seeders\SeedFakePatientsTableSeeder;
use App\Modules\Patient\Database\Seeders\SeedFakePatientTrackedInfoTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SeedFakePatientsTableSeeder::class,
//            SeedFakePatientGeneralInfoTableSeeder::class,
//            SeedFakePatientTrackedInfoTableSeeder::class,
//            SeedFakePatientSkillsTableSeeder::class,
//            SeedFakeAdminsTableSeeder::class,
            DoctorDatabaseSeeder::class,
        ]);
    }
}
