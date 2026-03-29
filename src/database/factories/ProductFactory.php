<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Condition;
use App\Models\User;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'         => $this->faker->word(),
            'price'        => $this->faker->numberBetween(100, 10000),
            'brand'        => $this->faker->word(),
            'detail'       => $this->faker->sentence(),
            'image'        => 'test.jpg',
            'condition_id' => 1,
            'buy_user_id'  => null,
            'sell_user_id' => null,
        ];
    }
}
