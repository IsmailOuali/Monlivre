<?php
namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
  function index(){
    return view('home');
  }
  
  function home(Request $request)
  {

    $query = $request->input('search');

        if ($query) {
            $books = DB::select(
                'SELECT books.* FROM books
                  JOIN authors ON books.author_id = authors.id
                 WHERE books.name LIKE ? OR authors.name LIKE ?',
                ["%{$query}%", "%{$query}%"]
            );
        }
        else {
          $books = Book::all();
        }
    $authors = Author::all();

    return view('home', compact('books', 'authors'));
  }

  public function addLoan($bookId)
{
    $user = auth()->user();
    $book = Book::findOrFail($bookId);


    Loan::create([
        'user_id' => $user->id,
        'book_id' => $book->id,
    ]);

    $book->status = 0;
    $book->save();

    return Redirect::back()->with('success', 'Book added to cart successfully.');
}
}
