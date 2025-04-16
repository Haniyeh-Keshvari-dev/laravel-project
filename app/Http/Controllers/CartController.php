<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Tests\Fixtures\Route;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);
        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'count' => ($cart[$product->id]['count'] ?? 0) + 1,
        ];
        session()->put('cart', $cart);
        return redirect()->route('home')->with('success', 'محصول به سبد خرید اضافه شد!');

    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);

        }
        return redirect()->route('cart.index')->with('success', 'با موفقیت حذف شد');
    }
}
