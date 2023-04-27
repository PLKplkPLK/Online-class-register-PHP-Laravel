<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'class_id' => fake()->numberBetween(1, 9), //id klasy
            'class_teacher_id' => fake()->numberBetween(4, 14), //zalozmy ze takie beda id dla wychowawcow
            'number_of_absences' => fake()->numberBetween(0, 20),
            'about' => fake()->realTextBetween(0, 50)
        ];
    }
}
