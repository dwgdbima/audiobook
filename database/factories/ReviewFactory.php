<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $point = $this->faker->numberBetween(3, 5);
        return [
            'book_id' => 1,
            'point' => $point,
            'comment' => $this->faker->paragraph()
        ];
    }
}
