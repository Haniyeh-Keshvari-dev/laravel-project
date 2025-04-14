<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['brand', 'features']);

        if ($request->filled('search')) {
            $searchTerm = $request->search;

            $query->whereHas('features', function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%");
            });
        }
        $products = $query->get();

        return view('product.index', compact('products'));
    }



    public function show(Product $product){

        $product->load(['brand','features']);
        return view('product.show',compact('product'));
    }
}
