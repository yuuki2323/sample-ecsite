@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-6">{{ $book->title }}のレビューを編集</h2>
    <form method="POST" action="{{ route('reviews.update', $review->id) }}" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="rating" class="block text-sm font-medium text-gray-700">評価</label>
            <select id="rating" name="rating" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>1</option>
                <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>2</option>
                <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>3</option>
                <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>4</option>
                <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>5</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="comment" class="block text-sm font-medium text-gray-700">コメント</label>
            <textarea id="comment" name="comment" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $review->comment }}</textarea>
        </div>
        <button type="submit" class="w-full bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">レビューを更新する</button>
    </form>
</div>
@endsection
