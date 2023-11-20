<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book = Book::where('id', '=', 1)->get();
        if ($book != null && $book->isNotEmpty()) {
            return;
        }
        Book::create([
            'author_id' => 1,
            'genre' => 'self-help',
            'name' => 'Atomic Habits',
            'description' => 'Atomic habits is a popular self-help book written by James Clear that focuses on developing good habits and personal growth. The book emphasizes the importance of small changes in one\'s daily routine to achieve success and improvements in various areas of life. Clear\'s writing style is clear, concise, and actionable, making it a highly effective guide for habit formation.',
            'pdf_file' => 'anything',
            'img' => 'anything',
            'published_at' => '2018-10-16'
        ]);
    }
}
