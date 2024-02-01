<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcements>
 */
class AnnouncementsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->paragraph(),
            // 'date' => $this->faker->dateTime(), 

            // 'user_id' => $this->faker->numberBetween(DB::table('users')->min('id'),DB::table('users')->max('id')),
            'company_id' => $this->faker->numberBetween(DB::table('companies')->min('id'),DB::table('companies')->max('id')),

            // 'user_id' => $this->faker->numberBetween(1, 10),
            // 'company_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
