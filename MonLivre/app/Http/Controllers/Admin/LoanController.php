<?php

namespace App\Http\Controllers\Admin;

use App\Models\Loan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with('user', 'book')->get();
        
        return view('admin.users.index', compact('loans'));
    }

    public function returnBook($loanId)
    {
        $loan = Loan::findOrFail($loanId);
        $book = $loan->book;

        $book->update(['status' => true]);

        $loan->delete();

        return redirect()->back()->with('success', 'Book returned successfully.');
    }
}
