<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>本を追加</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">新しい本を追加</h1>
        
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

        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">カテゴリー</label>
                <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-gray-700">タイトル</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('title') }}">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">説明</label>
                <textarea name="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description') }}</textarea>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">価格</label>
                <input type="number" name="price" id="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('price') }}">
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700">在庫</label>
                <input type="number" name="stock" id="stock" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('stock') }}">
            </div>
            <div class="mb-4">
                <label for="image_path" class="block text-gray-700">画像</label>
                <input type="file" name="image_path" id="image_path" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" accept="image/*" onchange="previewImage(event)">
                <img id="image_preview" class="mt-4 hidden w-32 h-32 object-cover">
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700">ステータス</label>
                <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="in_stock">在庫あり</option>
                    <option value="soldout">売り切れ</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">追加</button>
            </div>
        </form>
    </div>
    <script>
        function previewImage(event) {
            const input = event.target;
            const reader = new FileReader();
            reader.onload = function() {
                const imgElement = document.getElementById('image_preview');
                imgElement.src = reader.result;
                imgElement.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    </script>
</body>
</html>
