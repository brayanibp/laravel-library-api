<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'genre',
        'name',
        'description',
        'pdf_file',
        'img',
        'published_at',
    ];

    public static function handleAssetStorage(Request $request, string $field) {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $fileName = str_replace(' ','_',pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $filepath = $file->storeAs("books/$extension", $fileNameToStore);
            $fileUrl = asset("books/$extension/$fileNameToStore");
            return $fileUrl;
        }
        return 'Not Found';
    }
}
