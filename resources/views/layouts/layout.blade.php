<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '大人のための参考書サイト')</title>
    <!-- CSSやJavaScriptのリンク -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    @include('layouts.header')

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

    <footer class="bg-white shadow mt-8">
        <div class="container mx-auto px-4 py-4 text-center">
            &copy; 2024 大人のための参考書
        </div>
    </footer>
</body>
</html>
