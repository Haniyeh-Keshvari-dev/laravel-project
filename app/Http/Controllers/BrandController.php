<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function show(Brand $brand)
    {
        $products = $brand->products;
        return view('brand.show', compact('brand', 'products'));
    }
}
