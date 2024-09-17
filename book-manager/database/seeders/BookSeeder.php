<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BookSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->insert([
            [
                'title' => 'Harry Potter and the Sorcerer\'s Stone',
                'author' => 'J.K. Rowling',
                'genre' => 'Fantasy',
                'release_date' => '1997-06-26',
                'description' => 'The first book in the Harry Potter series, following the journey of a young wizard.',
                'cover_image' => 'uploads/books/hp.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dune',
                'author' => 'Frank Herbert',
                'genre' => 'Science Fiction',
                'release_date' => '1965-08-01',
                'description' => 'A science fiction epic set in a distant future amidst a huge interstellar empire.',
                'cover_image' => 'uploads/books/dune.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Witcher',
                'author' => 'Andrzej Sapkowski',
                'genre' => 'Fantasy',
                'release_date' => '1990-04-01',
                'description' => 'A collection of fantasy short stories and novels following the adventures of Geralt of Rivia.',
                'cover_image' => 'uploads/books/witcher.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'A Game of Thrones',
                'author' => 'George R.R. Martin',
                'genre' => 'Fantasy',
                'release_date' => '1996-08-06',
                'description' => 'The first book in the epic fantasy series "A Song of Ice and Fire," featuring political intrigue and dynastic struggles.',
                'cover_image' => 'uploads/books/got.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Lord of the Rings: The Fellowship of the Ring',
                'author' => 'J.R.R. Tolkien',
                'genre' => 'Fantasy',
                'release_date' => '1954-07-29',
                'description' => 'The first volume in "The Lord of the Rings" trilogy, detailing the journey of a hobbit and his companions.',
                'cover_image' => 'uploads/books/lotr.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);        
    }
}