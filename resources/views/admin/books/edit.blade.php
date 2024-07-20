<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>本を編集</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">本を編集</h1>
        
        <a href="{{ route('admin.books.index') }}" class="text-blue-500 hover:underline mb-6 inline-block">本の管理に戻る</a>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">カテゴリー</label>
                <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-gray-700">タイトル</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $book->title }}">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">説明</label>
                <textarea name="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ $book->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">価格</label>
                <input type="number" name="price" id="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $book->price }}">
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700">在庫</label>
                <input type="number" name="stock" id="stock" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ $book->stock }}">
            </div>
            <div class="mb-4">
                <label for="image_path" class="block text-gray-700">画像</label>
                <input type="file" name="image_path" id="image_path" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @if ($book->image_path)
                    <img src="{{ asset('storage/' . $book->image_path) }}" alt="{{ $book->title }}" class="w-32 h-32 object-cover mt-4">
                @endif
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700">ステータス</label>
                <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="in_stock" {{ $book->status == 'in_stock' ? 'selected' : '' }}>在庫あり</option>
                    <option value="soldout" {{ $book->status == 'soldout' ? 'selected' : '' }}>売り切れ</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">更新</button>
            </div>
        </form>
    </div>
</body>
</html>
