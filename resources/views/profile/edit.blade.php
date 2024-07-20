@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-6">プロフィール編集</h2>

    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                プロフィール情報
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                アカウントのプロフィール情報とメールアドレスを更新します。
            </p>
        </header>

        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">名前</label>
                <input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('name', Auth::user()->name) }}" required autofocus autocomplete="name">
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">メールアドレス</label>
                <input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('email', Auth::user()->email) }}" required autocomplete="username">
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

                @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! Auth::user()->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            メールアドレスは確認されていません。

                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                確認メールを再送信するにはここをクリック
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                新しい確認リンクがメールアドレスに送信されました。
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    保存
                </button>

                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >保存されました。</p>
                @endif
            </div>
        </form>
    </section>
</div>
@endsection
