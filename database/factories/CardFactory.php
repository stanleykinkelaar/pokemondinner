<?php

namespace Database\Factories;

use App\Models\Dish;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $colors = [
            'slate', 'gray', 'zinc', 'neutral',
            'stone', 'orange', 'amber', 'yellow',
            'lime', 'green', 'emerald', 'teal',
            'cyan', 'sky', 'blue',
            'indigo', 'violet', 'purple',
            'fuchsia', 'pink', 'rose',
        ];

        return [
            'color' => $this->faker->randomElement($colors),
            'dish_id' => Dish::factory()->create()->id,
            'active' => false,
        ];
    }
}
