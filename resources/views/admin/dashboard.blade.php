<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ダッシュボード</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- ヘッダー -->
        <header class="bg-blue-500 text-white py-4">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-2xl font-bold">管理者ダッシュボード</h1>
                <form method="POST" action="{{ route('admin.logout') }}" class="ml-4">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">ログアウト</button>
                </form>
            </div>
        </header>

        <!-- ナビゲーション -->
        <nav class="bg-white shadow-md py-4">
            <div class="container mx-auto flex justify-around">
                <a href="{{ route('admin.books.index') }}" class="text-blue-500 hover:underline">本の管理</a>
                <a href="{{ route('admin.profile.edit') }}" class="text-blue-500 hover:underline">プロフィールの変更</a>
                <!-- 他の管理機能へのリンク -->
            </div>
        </nav>

        <!-- メインコンテンツ -->
        <main class="flex-grow container mx-auto py-8">
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif
            <h2 class="text-xl font-semibold mb-6">管理機能を選択してください</h2>
            <!-- ここにダッシュボードのコンテンツが表示されます -->
        </main>

        <!-- フッター -->
        <footer class="bg-gray-800 text-white py-4">
            <div class="container mx-auto text-center">
                <p>&copy; 2023 管理者ダッシュボード. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
