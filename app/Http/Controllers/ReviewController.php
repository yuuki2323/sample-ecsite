<?php
namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    public function store(Request $request, $book_id)
    {
        $book = Book::findOrFail($book_id);

        // ユーザーが既にレビューを投稿しているか確認
        $existingReview = Review::where('book_id', $book_id)->where('user_id', Auth::id())->first();
        if ($existingReview) {
            return redirect()->route('books.show', $book_id)->with('error', 'あなたは既にこの本にレビューを投稿しています。');
        }

        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $data['user_id'] = Auth::id();
        $data['book_id'] = $book->id;

        Review::create($data);

        return redirect()->route('books.show', $book_id)->with('success', 'レビューが追加されました。');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        if (Gate::denies('update', $review)) {
            return redirect()->route('books.show', $review->book_id)->with('error', 'あなたはこのレビューを編集する権限がありません。');
        }
        $book = Book::findOrFail($review->book_id);

        return view('reviews.edit', compact('review', 'book'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        if (Gate::denies('update', $review)) {
            return redirect()->route('books.show', $review->book_id)->with('error', 'あなたはこのレビューを編集する権限がありません。');
        }
        $book = Book::findOrFail($review->book_id);

        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $review->update($data);

        return redirect()->route('books.show', $review->book_id)->with('success', 'レビューが更新されました。');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        if (Gate::denies('delete', $review)) {
            return redirect()->route('books.show', $review->book_id)->with('error', 'あなたはこのレビューを削除する権限がありません。');
        }
        $book = Book::findOrFail($review->book_id);
        $review->delete();

        return redirect()->route('books.show', $book->id)->with('success', 'レビューが削除されました。');
    }
}
