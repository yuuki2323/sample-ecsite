@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-6">マイページ</h2>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h3 class="text-lg font-medium text-gray-900">プロフィール情報</h3>
        <div class="mt-4">
            <div class="mb-4">
                <span class="block text-sm font-medium text-gray-700">名前:</span>
                <span class="mt-1 block w-full">{{ Auth::user()->name }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-sm font-medium text-gray-700">メールアドレス:</span>
                <span class="mt-1 block w-full">{{ Auth::user()->email }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-sm font-medium text-gray-700">電話番号:</span>
                <span class="mt-1 block w-full">{{ Auth::user()->phone }}</span>
            </div>
            <div class="mb-4">
                <span class="block text-sm font-medium text-gray-700">住所:</span>
                <span class="mt-1 block w-full">{{ Auth::user()->address }}</span>
            </div>
            <div>
                <a href="{{ route('profile.edit') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    編集
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
