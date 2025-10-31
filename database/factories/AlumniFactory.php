<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumni>
 */
class AlumniFactory extends Factory
{
    protected $model = \App\Models\Alumni::class;

    public function definition(): array
    {
        $courses = [
            'B.Ed - Early Childhood Education',
            'B.Ed - General Education',
            'B.S.Ed - Biology',
            'B.S.Ed - English',
            'B.S.Ed - Filipino',
            'B.S.Ed - Mathematics',
            'B.S.Ed - MAPEH',
            'B.S.Ed - Social Studies',
            'B.S. in Accountancy',
            'B.B.A - Business Economics',
            'B.B.A - Financial Management',
            'B.B.A - HR Development Management',
            'B.B.A - Marketing Management',
            'B.B.A - Production/Operations Management',
            'B.S. in Real Estate Management',
            'B.S. in Computer Science',
            'B.S. in Information System',
            'AB in English',
            'AB in History',
            'AB in Political Science',
            'B.S. in Nursing'
        ];

        $employmentStatuses = ['Employed', 'Unemployed', 'Self-Employed', 'Freelancer'];

        return [
            'student_id' => $this->faker->unique()->numerify('S######'),
            'email' => $this->faker->unique()->safeEmail(),
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->optional()->firstName(),
            'last_name' => $this->faker->lastName(),
            'suffix' => $this->faker->optional()->randomElement(['Jr.', 'Sr.', 'III']),
            'phone' => $this->faker->optional()->phoneNumber(),
            'address' => $this->faker->optional()->address(),
            'course' => $this->faker->randomElement($courses),
            'section' => $this->faker->optional()->bothify('Section ?##'),
            'major' => $this->faker->optional()->word(),
            'year_graduated' => $this->faker->numberBetween(2015, 2025),
            'employment_status' => $this->faker->randomElement($employmentStatuses),
            'company_name' => $this->faker->optional()->company(),
            'position' => $this->faker->optional()->jobTitle(),
            'profile_picture' => 'images/default.jpg',
            'achievements' => $this->faker->optional()->paragraphs(2, true),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}
