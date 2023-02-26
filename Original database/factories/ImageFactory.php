<?php

namespace Database\Factories;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $filename = $this->faker->numberBetween(1,10).'.jpg';
        return [
            //
            'path'=>"img/products/{$filename}",
        ];
    }

    public function user()
    {
        $filename = $this->faker->numberBetween(1,5).'.jpg';
        return $this->state([
            'path'=>"img/users/{$filename}",
        ]);

    }

}
