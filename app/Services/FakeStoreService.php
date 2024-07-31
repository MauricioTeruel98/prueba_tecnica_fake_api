<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\Category;

class FakeStoreService
{
    public function fetchAndStoreProducts()
    {
        $products = Http::get('https://fakestoreapi.com/products')->json();
        
        foreach ($products as $product) {
            $category = Category::firstOrCreate(['category' => $product['category']]);
            Product::create([
                'title' => $product['title'],
                'description' => $product['description'],
                'price' => $product['price'],
                'category_id' => $category->id,
            ]);
        }
    }
}