<?php

namespace Database\Seeders;
use Database\Seeders\UserSeeder;
use Database\Seeders\AuthorSeeder;
use Database\Seeders\BookSeeder;
use Database\Seeders\StatisticsSeeder;

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
            AuthorSeeder::class,
            BookSeeder::class,
            StatisticsSeeder::class,
        ]);
    }
}
