<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CustomerAccount;
use App\Models\Place;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'payment' => $this->faker->randomDigit,
            'hours' => $this->faker->numberBetween($min = 30, $max = 180),
            'customer_account_id'  => CustomerAccount::first(),
            'place_id'  => Place::first()
        ];
    }
}
