<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::get();

        return view('book.index', compact('books'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255|string',
            'author' => 'required|max:255|string',
            'genre' => 'required|max:255|string',
            'release_date' => 'required|date',
            'description' => 'required|max:255|string',
            'cover_image' => 'required|max:255|string'
        ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'cover_image' => $request->cover_image
        ]);

        return redirect('books/create')->with('status','Book Created');
    }
}
