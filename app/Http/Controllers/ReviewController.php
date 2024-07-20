<?php
namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $book_id)
    {
        $book = Book::findOrFail($book_id); // Bookモデルを使用して該当のBookを取得

        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $data['user_id'] = Auth::id();
        $data['book_id'] = $book->id;

        Review::create($data);

        return redirect()->route('books.show', $book_id)->with('success', 'Review added successfully.');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $book = Book::findOrFail($review->book_id); // Bookモデルを使用して該当のBookを取得

        return view('reviews.edit', compact('review', 'book'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $book = Book::findOrFail($review->book_id); // Bookモデルを使用して該当のBookを取得

        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $review->update($data);

        return redirect()->route('books.show', $review->book_id)->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $book = Book::findOrFail($review->book_id); // Bookモデルを使用して該当のBookを取得
        $review->delete();

        return redirect()->route('books.show', $book->id)->with('success', 'Review deleted successfully.');
    }
}
