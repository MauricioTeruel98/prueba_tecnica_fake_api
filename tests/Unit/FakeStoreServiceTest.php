<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\FakeStoreService;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FakeStoreServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testFetchAndStoreProducts()
    {
        Http::fake([
            'fakestoreapi.com/products' => Http::response([
                [
                    'title' => 'Test Product',
                    'description' => 'Test Description',
                    'price' => 9.99,
                    'category' => 'TestCategory'
                ]
            ], 200)
        ]);

        $service = new FakeStoreService();
        $service->fetchAndStoreProducts();

        $this->assertDatabaseHas('products', ['title' => 'Test Product']);
        $this->assertDatabaseHas('categories', ['category' => 'TestCategory']);
    }
}