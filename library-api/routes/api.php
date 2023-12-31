<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\ApiAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('/login')->group(function () {
    Route::post('/register', [ApiAuthController::class, 'register']);
    Route::post('/auth', [ApiAuthController::class, 'login']);
    Route::middleware('auth:api')->get('/user-details', [ApiAuthController::class, 'authenticatedUserDetails']);
});


// applying authentication middleware
Route::middleware('auth:api')->group(function () {
    Route::prefix('/books')->group(function () {
        Route::get('/read', [BooksController::class, 'getAll']);
        Route::get('/read/get/{id}', [BooksController::class, 'getBookInfo']);
        Route::get('/read/get/{id}/page/{page}', [BooksController::class, 'getBookFile']);
        Route::post('/add', [BooksController::class, 'store']);
    });

    Route::prefix('/statistics')->group(function () {
        Route::redirect('/', '/api/statistics/get');

        // Redirecting '/' route to '/get' to obtain the list of available statistics
        Route::get('/get', function (Request $request) {
            return [
                'statistics/get/most/readed/books',
                'statistics/get/less/readed/books',
                'statistics/get/most/popular/authors',
                'statistics/get/less/popular/authors',
            ];
        });

        // Statistics routes
        Route::prefix('/get')->group(function () {
            Route::get('most/readed/books', [StatisticsController::class, 'getMostReadedBooks']);
            Route::get('less/readed/books', [StatisticsController::class, 'getLessReadedBooks']);
            Route::get('most/popular/authors', [StatisticsController::class, 'getMostPopularAuthors']);
            Route::get('less/popular/authors', [StatisticsController::class, 'getLessPopularAuthors']);
        });
    });
});

