<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = ['title', 'author', 'release_date' ,'genre', 'description', 'cover_image'];

    public const GENRES = [
        'Fiction',
        'Non-Fiction',
        'Mystery',
        'Fantasy',
        'Science Fiction',
        'Biography',
        'Romance',
        'Historical',
        'Horror',
        'Thriller'
    ];
}
