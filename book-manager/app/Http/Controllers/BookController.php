<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function index(Request $request)
    {
        //parameters for filtering and sorting
        $search = $request->input('search');
        $genre = $request->input('genre');
        $release_date_from = $request->input('release_date_from');
        $release_date_to = $request->input('release_date_to');
        $order = $request->input('order', 'asc');  // Default to ascending order
        $sort_by = $request->input('sort_by', 'title'); // Default sorting by title
 
        $query = Book::query();
    
        //search (title)
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }
    
        //genre
        if ($genre) {
            $query->where('genre', $genre);
        }
    
        //release date between two dates
        if ($release_date_from && $release_date_to) {
            $query->whereBetween('release_date', [$release_date_from, $release_date_to]);
        }
    
        //sort by field and order
        $query->orderBy($sort_by, $order);
    
        //get  books
        $books = $query->get();
    
     
        return view('book.index', compact('books', 'search', 'genre', 'release_date_from', 'release_date_to', 'order', 'sort_by'));
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
            'cover_image' => 'nullable|mimes:ng,jpg,jpeg,webp'
        ]);

        if($request->has('cover_image')){
            $file = $request->file('cover_image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/books/';
            $file->move($path, $filename);
        }

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'cover_image' => $path.$filename
        ]);

        return redirect('books/create')->with('status','Book Created');
    }

    public function edit(int $id){
        $book = Book::findOrFail($id);
        return view('book.edit', compact('book'));
    }

    public function update(Request $request, int $id){
        $request->validate([
            'title' => 'required|max:255|string',
            'author' => 'required|max:255|string',
            'genre' => 'required|max:255|string',
            'release_date' => 'required|date',
            'description' => 'required|max:255|string',
            'cover_image' => 'nullable|mimes:ng,jpg,jpeg,webp'
            
        ]);

        $book = Book::findOrFail($id);

        if($request->has('cover_image')){
            $file = $request->file('cover_image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/books/';
            $file->move($path, $filename);

            if(File::exists($book->cover_image)){
                File::delete($book->cover_image);
            }
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'cover_image' => $path.$filename
        ]);

        return redirect()->back()->with('status','Book Updated');
    }

    public function destroy(int $id){
        $book = Book::findOrFail($id);

        if(File::exists($book->cover_image)){
            File::delete($book->cover_image);
        }

        $book->delete();

        return redirect()->back()->with('status','Book Deleted');

    }
}
