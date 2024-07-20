@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-6">検索結果：{{ $query }}</h2>
    @if($books->isEmpty())
        <p>検索結果が見つかりませんでした。</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($books as $book)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $book->image_path) }}" alt="{{ $book->title }}">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $book->title }}</h3>
                        <p class="text-gray-600 mt-2">¥{{ number_format($book->price, 2) }}</p>
                        <form action="{{ route('cart.add', $book->id) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                カートに入れる
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
