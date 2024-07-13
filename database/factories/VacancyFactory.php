<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => fake()->text(60),
            'salary_id' => rand(1, 9),
            'category_id' => rand(1, 7),
            'company' => fake()->company(),
            // 'last_date' => rand( strtotime("Jul 15 2024"), strtotime("Aug 30 2024") ),
            'last_date' => fake()->dateTimeBetween('2024-07-15', '2024-08-30'),
            'description' => fake()->text(255),
            'file' => 'TMjlv1c3dSlULlQctClfZYWOvWN7jk74asTy2awT.jpg',
            'user_id' => rand(1, 2),
        ];
    }
}
