<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spice>
 */
class SpiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name'=>'Medium',
            'icon'=>"<i class=\'fas fa-pepper-hot\' style=\'font-size:48px;color:red\'></i>",
        ];
    }
}
