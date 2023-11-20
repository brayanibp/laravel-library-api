<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AuthorsStatistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'times_consulted',
    ];

    // fetch top 100 most popular authors
    public static function getMostPopularAuthors() {
        return DB::table('authors_statistics')->join('authors', 'authors.id', '=', 'authors_statistics.author_id')->select('authors.name', 'authors_statistics.author_id', 'authors_statistics.times_consulted')->orderBy('times_consulted','desc')->take(100)->get();
    }

    // fetch top 100 less popular authors
    public static function getLessPopularAuthors() {
        return DB::table('authors_statistics')->join('authors', 'authors.id', '=', 'authors_statistics.author_id')->select('authors.name', 'authors_statistics.author_id', 'authors_statistics.times_consulted')->orderBy('times_consulted','asc')->take(100)->get();
    }
}
