<!DOCTYPE html>
<html>
<head>
    <title>Edit Review</title>
</head>
<body>
    <h1>Edit Review for {{ $book->title }}</h1>
    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Rating:</label>
            <input type="number" name="rating" value="{{ $review->rating }}" min="1" max="5" required>
        </div>
        <div>
            <label>Comment:</label>
            <textarea name="comment" required>{{ $review->comment }}</textarea>
        </div>
        <div>
            <button type="submit">Update Review</button>
        </div>
    </form>
</body>
</html>
