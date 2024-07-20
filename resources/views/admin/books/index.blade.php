<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>本の管理</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">本の管理</h1>
        
        <a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:underline mb-6 inline-block">管理者画面に戻る</a>

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.books.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6 inline-block">新しい本を追加</a>

        <div class="bg-white rounded-lg shadow-md p-6">
            <ul>
                @foreach($books as $book)
                    <li class="border-b last:border-none py-4 flex items-center justify-between">
                        <div class="flex items-center">
                            @if ($book->image_path)
                                <img src="{{ asset('storage/' . $book->image_path) }}" alt="{{ $book->title }}" class="w-16 h-16 object-cover rounded mr-4">
                            @endif
                            <div>
                                <h2 class="text-lg font-semibold">{{ $book->title }}</h2>
                                <p class="text-gray-600">¥{{ number_format($book->price, 2) }}</p>
                                <p class="text-gray-600">{{ $book->stock > 0 ? '在庫: ' . $book->stock : '在庫なし' }}</p>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('admin.books.edit', $book->id) }}" class="text-blue-500 hover:underline mr-4">編集</a>
                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">削除</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
