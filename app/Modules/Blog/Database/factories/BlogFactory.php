<?php

namespace App\Modules\Blog\Database\factories;

use App\Models\User;
use App\Modules\Blog\Entities\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class BlogFactory extends Factory
{
    private $userId;

    public function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);
        $this->userId = User::pluck('id')->all();
    }

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realTextBetween(10, 30),
            'text' => $this->faker->realTextBetween(50, 1000),
            'user_id' => $this->faker->randomElement($this->userId)
        ];
    }
}

