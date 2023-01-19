<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OwnerAccount;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'spot_name' => $this->faker->streetName,
            'location' => $this->faker->city,
            'description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'available_slot' => $this->faker->randomDigit,
            'owner_account_id' => OwnerAccount::first()

        ];
    }
}
