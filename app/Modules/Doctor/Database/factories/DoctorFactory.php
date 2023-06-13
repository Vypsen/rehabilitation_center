<?php

namespace App\Modules\Doctor\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Modules\Doctor\Entities\Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'lastname' => $this->faker->lastName(),
            'midname' => $this->faker->name(),
            'number_phone' => $this->faker->phoneNumber(),
            'bdate' => $this->faker->date(),
            'post' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['М', 'Ж']),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ];
    }
}

