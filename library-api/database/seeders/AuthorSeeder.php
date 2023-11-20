<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $author = Author::where('id', '=', 1)->get();
        if ($author != null && $author->isNotEmpty()) {
            return;
        }
        Author::create([
            'name' => 'James Clear',
        ]);
    }
}
