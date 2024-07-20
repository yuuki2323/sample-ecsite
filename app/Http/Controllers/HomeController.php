<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $newBooks = Book::where('status', 'in_stock')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

            return view('index', compact('newBooks'));
    }
}
