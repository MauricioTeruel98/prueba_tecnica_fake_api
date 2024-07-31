<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function testProductCreation()
    {
        $category = Category::factory()->create();
        $product = Product::create([
            'title' => 'Test Product',
            'description' => 'Test Description',
            'price' => 9.99,
            'category_id' => $category->id,
        ]);

        $this->assertDatabaseHas('products', ['title' => 'Test Product']);
    }
}