<header class="bg-white shadow">
    <div class="container mx-auto flex justify-between items-center py-4 px-4">
        <div class="flex items-center gap-4">
            <a href="{{ route('home') }}">
                <h1 class="text-2xl font-bold">大人のための参考書</h1>
            </a>

            <form action="{{ route('search') }}" method="GET" class="flex items-center">
                <input type="text" name="query" placeholder="キーワードで探す"
                    class="w-60 border-green-400 border-2 rounded-l focus:outline-none px-2 py-2 h-10">
                <button type="submit" class="bg-green-400 px-4 py-2 font-semibold text-white text-center rounded-r h-10">検索</button>
            </form>
        </div>

        <div class="flex gap-8 items-center">
            <a href="{{ route('cart.index') }}" class="flex items-center relative">
                <img src="{{ asset('/cart.svg') }}" class="w-8 h-8" />
                @php
                    $cartItemCount = App\Http\Controllers\CartController::getCartItemCount();
                @endphp
                @if ($cartItemCount > 0)
                    <span
                        class="absolute top-0 left-0 transform -translate-x-1/2 -translate-y-1/2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">{{ $cartItemCount }}</span>
                @endif
                <span class="ml-2">カートを見る</span>
            </a>
            @auth
                <div class="flex gap-4 items-center">
                    <a href="{{ route('profile.show') }}"
                        class="px-4 py-2 border-2 border-green-400 rounded font-semibold text-green-400">マイページ</a>
                    <span class="font-semibold">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 px-4 py-2 rounded font-semibold text-white text-center">ログアウト</button>
                    </form>
                </div>
            @else
                <div class="flex gap-4">
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 border-2 border-green-400 rounded font-semibold text-green-400">新規登録</a>
                    <a href="{{ route('login') }}"
                        class="bg-green-400 px-4 py-2 rounded font-semibold text-white text-center">ログイン</a>
                </div>
            @endauth
        </div>
    </div>

    <div class="border-y border-green-400 w-full bg-green-100">
        <nav class="py-4">
            <ul class="flex justify-center items-center text-xl gap-8">
                <li><a href="{{ route('category.show', 'mathematics') }}"
                        class="bg-blue-400 text-white py-1 px-4 rounded">数学</a></li>
                <li><a href="{{ route('category.show', 'english') }}"
                        class="bg-red-400 text-white py-1 px-4 rounded">英語</a></li>
                <li><a href="{{ route('category.show', 'bookkeeping') }}"
                        class="bg-green-400 text-white py-1 px-4 rounded">簿記</a></li>
                <li><a href="{{ route('category.show', 'tax-accountant') }}"
                        class="bg-blue-950 text-white py-1 px-4 rounded">税理士</a></li>
            </ul>
        </nav>
    </div>
</header>
