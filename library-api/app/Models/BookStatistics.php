<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStatistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'times_readed',
    ];
}
