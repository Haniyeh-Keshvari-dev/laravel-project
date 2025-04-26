<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Feature;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'brand_id' => 'required|integer|exists:brands,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagepath = null;
        if ($request->hasFile('image')) {
            $imagepath = $request->file('image')->store('product_images', 'public');
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'brand_id' => $request->brand_id,
            'image' => $imagepath,
        ]);
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $validatedData['image'] = $request->file('image')->store('product_images', 'public');
        }
        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', 'محصول با موفقیت به‌روزرسانی شد!');
    }


    public function destroy(Product $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
