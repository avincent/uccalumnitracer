<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Achievement;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        // Create 9 dummy achievements
        Achievement::factory()->count(9)->create();
    }
}
