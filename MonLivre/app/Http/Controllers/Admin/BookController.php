<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all(); 
        $authors = Author::all(); 


        return view('admin.books.index', compact('books', 'authors'));
    }
    public function create()
    {
        $authors = Author::all(); 

        return view('admin.books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'date' => 'required|date',
        ]);

        Book::create([
            'name' => $request->name,
            'author_id' => $request->author_id,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.books.index')->with('success', 'Book added successfully.');
    }
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully.');
    }
}
