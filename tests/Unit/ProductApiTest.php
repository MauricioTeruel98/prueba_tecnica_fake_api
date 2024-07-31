<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function testGetProductsByCategory()
    {
        $category = Category::factory()->create(['category' => 'TestCategory']);
        Product::factory()->create([
            'category_id' => $category->id,
        ]);

        $response = $this->get('/api/TestCategory');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'data' => [
                '*' => [
                    'title',
                    'description',
                    'price',
                    'category' => [
                        'id',
                        'category'
                    ]
                ]
            ]
        ]);
    }
}