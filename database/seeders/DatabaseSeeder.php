<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        for ($i = 0; $i < 120; $i++) {
            User::create([
                'custom_id' => Str::random(10),
                'has_voted' => false,
            ]);
        }
        $this->call([
            CandidateSeeder::class,
            // Add other seeders here as needed
        ]);
    }
}
