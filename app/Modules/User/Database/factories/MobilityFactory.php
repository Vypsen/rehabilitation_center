<?php

namespace App\Modules\User\Database\factories;

use App\Modules\User\Entities\Mobility;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\User\Entities\Mobility>
 */
class MobilityFactory extends Factory
{

    protected $model = Mobility::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->firstName(),
            'lying_turn' => fake()->boolean(),
            'sits' => fake()->boolean(),
            'gets_up' => fake()->boolean(),
            'to_stand' => fake()->boolean(),
            'get_up_sits_down' => fake()->boolean(),
            'helps_walking_room' => fake()->boolean(),
            'stairwell' => fake()->boolean(),
            'walking_street' => fake()->boolean(),
            'walking_room' => fake()->boolean(),
            'raise_item' => fake()->boolean(),
            'walks_gravel' => fake()->boolean(),
            'washes' => fake()->boolean(),
            'ladder' => fake()->boolean(),
            'running' => fake()->boolean(),
            'edate' => 0,
        ];
    }
}
