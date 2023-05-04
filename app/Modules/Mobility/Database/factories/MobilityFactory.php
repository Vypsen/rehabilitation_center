<?php

namespace App\Modules\Mobility\Database\factories;

use App\Modules\Mobility\Entities\Mobility;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Mobility\Entities\Mobility>
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
            'sdate' => now(),
            'edate' => 0,
        ];
    }
}
