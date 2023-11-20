<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AuthorsStatistics;
use App\Models\BooksStatistics;

class StatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authorStats = AuthorsStatistics::where('id', '=', 1)->get();
        $bookStats = BooksStatistics::where('id', '=', 1)->get();

        if ($authorStats != null && $authorStats->isNotEmpty()) {
            return;
        }
        AuthorsStatistics::create([
            'author_id' => 1,
            'times_consulted' => 0,
        ]);

        if ($bookStats != null && $bookStats->isNotEmpty()) {
            return;
        }
        BooksStatistics::create([
            'book_id' => 1,
            'times_readed' => 0,
        ]);
    }
}
