@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">{{ $book->title }}のレビュー管理</h2>
        <a href="{{ route('admin.books.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">戻る</a>
    </div>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if($reviews->isEmpty())
        <p>レビューが見つかりませんでした。</p>
    @else
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-100">ユーザー</th>
                        <th class="py-2 px-4 bg-gray-100">評価</th>
                        <th class="py-2 px-4 bg-gray-100">コメント</th>
                        <th class="py-2 px-4 bg-gray-100">アクション</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reviews as $review)
                        <tr>
                            <td class="border px-4 py-2">{{ $review->user->name }}</td>
                            <td class="border px-4 py-2">{{ $review->rating }} / 5</td>
                            <td class="border px-4 py-2">{{ $review->comment }}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
