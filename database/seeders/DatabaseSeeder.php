<?php

namespace Database\Seeders;

use App\Models\Announcements;
use App\Models\Companies;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // You need to wrap this part inside the run() method
        // DB::table('users')->insert([
        //     'name' => 'Test Userhsss',
        //     'email' => 'testusersjjs@gmail.com',
            
        // ]);

        Companies::factory(10)->create();
        Announcements::factory(10)->create();
    }
}


