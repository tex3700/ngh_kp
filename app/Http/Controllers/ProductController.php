<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(string $slug)
    {
        $product = Product::find($slug);

        $products = Product::all();

        abort_if($product === null, 404);

        $documents = Document::forProduct($slug);

        return view('products.show', compact('product', 'products', 'documents'));
    }
}
