<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_lists_featured_products(): void
    {
        $featured = Product::factory()->create(['is_featured' => true]);

        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee($featured->name);
    }

    public function test_products_index_lists_all_products(): void
    {
        $product = Product::factory()->create();

        $response = $this->get(route('products.index'));

        $response->assertOk();
        $response->assertSee($product->name);
    }

    public function test_product_show_displays_product_details(): void
    {
        $product = Product::factory()->create();

        $response = $this->get(route('products.show', $product));

        $response->assertOk();
        $response->assertSee($product->name);
        $response->assertSee(number_format($product->price));
    }
}
