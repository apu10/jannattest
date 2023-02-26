<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $users= User::all();
        return [
            //

            'address_line_1'=> $this->faker->address(),
            'address_line_2'=> NULL,
            'county'=> $this->faker->city(),
            'country'=> 'UK',
            'post_code'=>$this->faker->postcode,
        ];
    }
}
