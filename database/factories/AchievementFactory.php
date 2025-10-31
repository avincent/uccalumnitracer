<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievement>
 */
class AchievementFactory extends Factory
{
    protected $model = \App\Models\Achievement::class;

    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-3 years', 'now');
        $end = $this->faker->dateTimeBetween($start, 'now');

        return [
            'project_name'   => $this->faker->sentence(3),       // e.g., "Community Library Project"
            'date_started'   => $start->format('Y-m-d'),
            'date_finished'  => $end->format('Y-m-d'),
            'project_photo'  => 'images/default.jpg',
        ];
    }
}
