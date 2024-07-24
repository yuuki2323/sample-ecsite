「本の追加」ボタンを再度追加するために、ビューを以下のように更新します。

### 更新されたビュー

#### resources/views/admin/books/index.blade.php

```blade
@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-6">本の管理</h2>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <div class="flex justify-between items-center mb-4">
        <form method="GET" action="{{ route('admin.books.index') }}" class="p-4 flex gap-4">
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">カテゴリー</label>
                <select name="category" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">全て</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="sort" class="block text-sm font-medium text-gray-700">並び替え</label>
                <select name="sort" id="sort" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="updated_at" {{ request('sort') == 'updated_at' ? 'selected' : '' }}>更新順</option>
                    <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>あいうえお順</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">フィルター</button>
            </div>
        </form>
        <a href="{{ route('admin.books.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">本を追加</a>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-100">タイトル</th>
                    <th class="py-2 px-4 bg-gray-100">カテゴリー</th>
                    <th class="py-2 px-4 bg-gray-100">価格</th>
                    <th class="py-2 px-4 bg-gray-100">在庫</th>
                    <th class="py-2 px-4 bg-gray-100">アクション</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td class="border px-4 py-2">{{ $book->title }}</td>
                        <td class="border px-4 py-2">{{ $book->category->name }}</td>
                        <td class="border px-4 py-2">¥{{ number_format($book->price, 2) }}</td>
                        <td class="border px-4 py-2">{{ $book->stock }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.books.edit', $book->id) }}" class="text-blue-500 hover:underline">編集</a>
                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline ml-2">削除</button>
                            </form>
                            <a href="{{ route('admin.reviews.index', $book->id) }}" class="text-blue-500 hover:underline ml-2">レビュー管理</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
