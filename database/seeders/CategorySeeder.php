<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = Http::get('https://fakestoreapi.com/products/categories')->json();
        
        foreach ($categories as $category) {
            Category::create(['category' => $category]);
        }
    }
}
