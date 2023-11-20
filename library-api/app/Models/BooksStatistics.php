<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BooksStatistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'times_readed',
    ];

    // fetch top 100 most readed books
    public static function getMostReadedBooks() {
        return DB::table('books_statistics')->join('books', 'books.id', '=', 'books_statistics.book_id')->select('books.name', 'books.genre', 'books_statistics.book_id', 'books_statistics.times_readed')->orderBy('times_readed','desc')->take(100)->get();
    }

    // fetch top 100 less readed books
    public static function getLessReadedBooks() {
        return DB::table('books_statistics')->join('books', 'books.id', '=', 'books_statistics.book_id')->select('books.name', 'books.genre', 'books_statistics.book_id', 'books_statistics.times_readed')->orderBy('times_readed','asc')->take(100)->get();
    }
}
