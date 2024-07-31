<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function getProductsByCategory($category)
    {
        $category = Category::where('category', $category)->first();

        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Category not found'], 404);
        }

        $products = Product::where('category_id', $category->id)->get()->map(function($product) use ($category) {
            return [
                'title' => $product->title,
                'description' => $product->description,
                'price' => $product->price,
                'category' => [
                    'id' => $category->id,
                    'category' => $category->category
                ]
            ];
        });

        return response()->json(['success' => true, 'data' => $products]);
    }
}