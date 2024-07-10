<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/add-loan/{bookId}', [HomeController::class, 'addLoan'])->name('addLoan');

});

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function (){
            return view('/Admin/dashboard'); 
        })->name('admin.dashboard');
        Route::get('authors', [AuthorController::class, 'index'])->name('admin.authors.index');
        Route::post('authors/store', [AuthorController::class, 'store'])->name('admin.authors.store'); 
        Route::delete('authors/{id}', [AuthorController::class, 'destroy'])->name('admin.authors.destroy');
        Route::get('books', [BookController::class, 'index'])->name('admin.books.index'); 
        Route::get('books/create', [BookController::class, 'create'])->name('admin.books.create');
        Route::post('books/store', [BookController::class, 'store'])->name('admin.books.store');
        Route::delete('books/{id}', [BookController::class, 'destroy'])->name('admin.books.destroy');
    });
});

Route::get('home', [HomeController::class , 'home'])->name('home');

