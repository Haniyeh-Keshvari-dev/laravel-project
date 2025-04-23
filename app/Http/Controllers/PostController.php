<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Feature;
use App\Models\Product;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Product::all();
        return view('posts.index', compact('post'));
    }

    public function show(Product $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('posts.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'brand_id' => 'required|integer|exists:brands,id',
        ]);
        Product::create($validatedData);
        return redirect()->route('posts.index')->with('success', 'محصول با موفقیت اضافه شد!');
    }

    public function edit(Product $post)
    {
        $brands = Brand::all();
        return view('posts.edit', compact('post', 'brands'));
    }

    public function update(Request $request, Product $post)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'brand_id' => 'required|integer|exists:brands,id',
        ]);
        $post->update($validatedData);
        return redirect()->route('posts.index');
    }

    public function destroy(Product $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
