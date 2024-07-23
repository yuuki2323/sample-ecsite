<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewManagementController extends Controller
{
    public function index($bookId)
    {
        $book = Book::findOrFail($bookId);
        $reviews = $book->reviews;

        return view('admin.reviews.index', compact('book', 'reviews'));
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.reviews.index', $review->book_id)->with('success', 'レビューが削除されました。');
    }
}
