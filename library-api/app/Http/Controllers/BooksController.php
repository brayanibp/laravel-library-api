<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BooksStatistics;
use App\Models\AuthorsStatistics;

class BooksController extends Controller
{
    public function getAll(Request $request) {
        return Book::get();
    }

    public function store(Request $request) {
        $pdf = Book::handleAssetStorage($request, 'pdf_file');
        $img = Book::handleAssetStorage($request, 'img');
        $book = Book::create([
            'author_id' => $request->input('author_id'),
            'genre' => $request->input('genre'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'pdf_file' => $pdf,
            'img' => $img,
            'published_at' => $request->input('published_at'),
        ]);

        BooksStatistics::create(['book_id' => $book->id, 'times_readed' => 0]);
        AuthorsStatistics::create(['author_id' => $book->author_id, 'times_consulted' => 0]);

        return $book;
    }

    public function getBookInfo(int $id) {
        $book = Book::where('id', '=', $id)->get()[0];
        $bookStatistics = BooksStatistics::where('book_id', '=', $book->id);
        $bookStatistics->update(['times_readed' => ($bookStatistics->get()[0]->times_readed + 1)]);
        $authorStatistics = AuthorsStatistics::where('author_id', '=', $book->author_id);
        $authorStatistics->update(['times_consulted' => ($authorStatistics->get()[0]->times_consulted + 1)]);
        return $book;
    }

    public function getBookFile(int $id, int $page = 0) {
        $book = Book::where('id', '=', $id)->get()[0];
        return $book->pdf_file;
    }

}
