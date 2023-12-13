<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassType::create([
            'name' => 'Yoga',
            'description' => fake()->text(),
            'minutes' => 60,
        ]);

        ClassType::create([
            'name' => 'boxing',
            'description' => fake()->text(),
            'minutes' => 40,
        ]);

        ClassType::create([
            'name' => 'Fitness',
            'description' => fake()->text(),
            'minutes' => 70,
        ]);

        ClassType::create([
            'name' => 'Yoga for Seniors',
            'description' => fake()->text(),
            'minutes' => 55,
        ]);
    }
}
