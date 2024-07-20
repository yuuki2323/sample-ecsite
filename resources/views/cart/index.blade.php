@extends('layouts.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-6">カート</h2>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if(count($cart) > 0)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-100">商品</th>
                        <th class="py-2 px-4 bg-gray-100">価格</th>
                        <th class="py-2 px-4 bg-gray-100">数量</th>
                        <th class="py-2 px-4 bg-gray-100">合計</th>
                        <th class="py-2 px-4 bg-gray-100">アクション</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $bookId => $details)
                        @php $total += $details['price'] * $details['quantity']; @endphp
                        <tr>
                            <td class="border px-4 py-2">
                                <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['title'] }}" class="w-16 h-16 object-cover inline-block">
                                <span>{{ $details['title'] }}</span>
                            </td>
                            <td class="border px-4 py-2">¥{{ number_format($details['price'], 2) }}</td>
                            <td class="border px-4 py-2">{{ $details['quantity'] }}</td>
                            <td class="border px-4 py-2">¥{{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('cart.remove', $bookId) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4">
                <h3 class="text-xl font-semibold">合計: ¥{{ number_format($total, 2) }}</h3>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">購入手続きに進む</button>
            </div>
        </div>
    @else
        <p>カートに商品がありません。</p>
    @endif
</div>
@endsection
