<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Book $book)
    {
        $cart = Session::get('cart', []);
        $cart[$book->id] = [
            'title' => $book->title,
            'price' => $book->price,
            'quantity' => ($cart[$book->id]['quantity'] ?? 0) + 1,
            'image' => $book->image_path,
        ];

        Session::put('cart', $cart);

        return redirect()->route('home')->with('success', 'カートに追加されました');
    }

    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart.index', compact('cart'));
    }


    public function remove($bookId)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$bookId])) {
            unset($cart[$bookId]);
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', '商品をカートから削除しました');
    }

    public static function getCartItemCount()
    {
        $cart = Session::get('cart', []);
        $count = 0;
        foreach ($cart as $item) {
            $count += $item['quantity'];
        }
        return $count;
    }
}
