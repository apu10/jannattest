<?php

namespace Database\Factories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition()
    {
        return [
            //
            'category_id'=>$this->faker->numberBetween(1,10),
            'spice_id'=>$this->faker->numberBetween(1,3),
            'title'=>$this->faker->sentence(3),
            'description'=>$this->faker->paragraph(1),
            'price'=>$this->faker->randomFloat($maxDecimal=2, $min=3, $max=100),
            'stock'=>$this->faker->numberBetween(1,10),
            'status'=>$this->faker->randomElement(['available','unavailable']),
        ];

    }
}
