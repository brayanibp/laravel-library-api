<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BooksStatistics;
use App\Models\AuthorsStatistics;

class StatisticsController extends Controller
{
    // fetch top 100 most readed books
    public function getMostReadedBooks() {
        return BooksStatistics::getMostReadedBooks();
    }

    // fetch top 100 less readed books
    public function getLessReadedBooks() {
        return BooksStatistics::getLessReadedBooks();
    }

    // fetch top 100 most popular authors
    public function getMostPopularAuthors() {
        return AuthorsStatistics::getMostPopularAuthors();
    }

    // fetch top 100 less popular authors
    public function getLessPopularAuthors() {
        return AuthorsStatistics::getLessPopularAuthors();
    }
}
