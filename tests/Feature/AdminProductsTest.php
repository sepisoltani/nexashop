<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get(route('admin.products.index'));

        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_login_and_view_products(): void
    {
        $admin = User::factory()->create(['password' => 'password']);

        $response = $this->post(route('admin.login.store'), [
            'email' => $admin->email,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $this->assertAuthenticatedAs($admin);
    }

    public function test_admin_can_create_a_product(): void
    {
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->post(route('admin.products.store'), [
            'name' => 'محصول تستی',
            'short_description' => 'توضیح کوتاه',
            'description' => 'توضیحات کامل',
            'price' => 199000,
            'image' => 'images/products/nova-x-headphones.jpg',
            'category' => 'تست',
            'stock' => 10,
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseHas('products', ['name' => 'محصول تستی']);
    }

    public function test_admin_can_update_a_product(): void
    {
        $admin = User::factory()->create();
        $product = Product::factory()->create();

        $response = $this->actingAs($admin)->put(route('admin.products.update', $product), [
            'name' => 'نام ویرایش‌شده',
            'short_description' => $product->short_description,
            'description' => $product->description,
            'price' => $product->price,
            'image' => $product->image,
            'category' => $product->category,
            'stock' => $product->stock,
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseHas('products', ['id' => $product->id, 'name' => 'نام ویرایش‌شده']);
    }

    public function test_admin_can_delete_a_product(): void
    {
        $admin = User::factory()->create();
        $product = Product::factory()->create();

        $response = $this->actingAs($admin)->delete(route('admin.products.destroy', $product));

        $response->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
