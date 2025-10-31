<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumni;

class AlumniSeeder extends Seeder
{
    public function run(): void
    {
        // Generate 20 dummy alumni using the factory
        Alumni::factory()->count(70)->create();
    }
}
