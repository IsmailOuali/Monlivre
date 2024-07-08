<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
    Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('dashboard', function (){
    return view('/Admin/dashboard'); 
})->name('admin.dashboard');

Route::prefix('admin')->group(function () {
    Route::get('authors', [AuthorController::class, 'index'])->name('admin.authors.index'); // List authors
    Route::post('authors/store', [AuthorController::class, 'store'])->name('admin.authors.store'); // Store new author
    Route::delete('authors/{id}', [AuthorController::class, 'destroy'])->name('admin.authors.destroy'); // Delete author
});
