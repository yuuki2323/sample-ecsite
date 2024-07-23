@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-6">{{ $book->title }}</h2>
    <div class="flex flex-col md:flex-row gap-6">
        <div class="md:w-1/2">
            <img class="w-full h-auto object-cover rounded-lg shadow-md" src="{{ asset('storage/' . $book->image_path) }}" alt="{{ $book->title }}">
        </div>
        <div class="md:w-1/2">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <p class="text-gray-700 text-lg">{{ $book->description }}</p>
                <p class="text-gray-900 text-2xl font-semibold mt-4">価格: ¥{{ number_format($book->price, 2) }}</p>
                <p class="text-gray-600 mt-2">在庫: 
                    <span class="{{ $book->stock > 0 ? 'text-green-500' : 'text-red-500' }}">
                        {{ $book->stock > 0 ? '在庫あり' : '在庫切れ' }}
                    </span>
                </p>
                <form action="{{ route('cart.add', $book->id) }}" method="POST" class="mt-6">
                    @csrf
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        カートに入れる
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="mt-8">
        <h3 class="text-2xl font-bold mb-4">レビュー</h3>
        <!-- レビュー一覧 -->
        @foreach($book->reviews as $review)
            <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                <p class="text-gray-700">{{ $review->comment }}</p>
                <p class="text-gray-600 text-sm mt-2">評価: 
                    <span class="font-bold">{{ $review->rating }} / 5</span>
                </p>
                @can('update', $review)
                    <a href="{{ route('reviews.edit', $review->id) }}" class="text-blue-500 hover:underline">編集</a>
                @endcan
                @can('delete', $review)
                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline ml-4">削除</button>
                    </form>
                @endcan
            </div>
        @endforeach

        <!-- レビュー投稿フォーム -->
        @auth
            @if(!$book->reviews->where('user_id', auth()->id())->count())
                <button id="review-button" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">レビューを書く</button>
                <form id="review-form" action="{{ route('reviews.store', $book->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md mt-6 hidden">
                    @csrf
                    <div class="mb-4">
                        <label for="rating" class="block text-sm font-medium text-gray-700">評価</label>
                        <select id="rating" name="rating" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="comment" class="block text-sm font-medium text-gray-700">コメント</label>
                        <textarea id="comment" name="comment" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">レビューを投稿する</button>
                </form>
            @else
                <p class="mt-6 text-gray-700">あなたは既にこの本にレビューを投稿しています。</p>
            @endif
        @else
            <p class="mt-6 text-gray-700">レビューを投稿するには<a href="{{ route('login') }}" class="text-blue-500 hover:underline">ログイン</a>してください。</p>
        @endauth
    </div>
</div>
<script>
document.getElementById('review-button').addEventListener('click', function() {
    document.getElementById('review-form').classList.toggle('hidden');
});
</script>
@endsection
