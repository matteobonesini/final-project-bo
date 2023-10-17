<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SponsorshipSeeder::class,
            VoteSeeder::class,
            WorkFieldSeeder::class,
            DeveloperSeeder::class,
            MessageSeeder::class,
            ReviewSeeder::class,
        ]);   
    }
}

