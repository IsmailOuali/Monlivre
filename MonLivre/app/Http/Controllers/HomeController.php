<?php
namespace App\Http\Controllers;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  function index(){
    return view('home');
  }
  
  function home()
  {
    $books = Book::all();
    $authors = Author::all();

    return view('home', compact('books', 'authors'));
  }
}
