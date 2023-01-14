<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryProductsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_category_products()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create();

        $category->products()->attach($product);

        $response = $this->getJson(
            route('api.categories.products.index', $category)
        );

        $response->assertOk()->assertSee($product->name);
    }

    /**
     * @test
     */
    public function it_can_attach_products_to_category()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create();

        $response = $this->postJson(
            route('api.categories.products.store', [$category, $product])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $category
                ->products()
                ->where('products.id', $product->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_products_from_category()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create();

        $response = $this->deleteJson(
            route('api.categories.products.store', [$category, $product])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $category
                ->products()
                ->where('products.id', $product->id)
                ->exists()
        );
    }
}
