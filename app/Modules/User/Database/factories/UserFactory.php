<?php

namespace App\Modules\User\Database\factories;

use App\Modules\User\Entities\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\User\Entities\User>
 */
class UserFactory extends Factory
{

    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'patronymic' => fake()->name(),
            'number_phone' => fake()->phoneNumber(),
            'bdate' => fake()->numberBetween(-946771200, 1577836800),
            'email' => fake()->safeEmail(),
            'registration_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ];
    }
}
