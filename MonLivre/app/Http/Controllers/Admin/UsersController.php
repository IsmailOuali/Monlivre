namespace App\Http\Controllers\Admin;

<?php

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $loans = Loan::with('user', 'book')->get();
        
        return view('admin.users.index', compact('loans'));
    }
}
