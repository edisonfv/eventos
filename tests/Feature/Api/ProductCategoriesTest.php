<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductCategoriesTest extends TestCase
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
    public function it_gets_product_categories()
    {
        $product = Product::factory()->create();
        $category = Category::factory()->create();

        $product->categories()->attach($category);

        $response = $this->getJson(
            route('api.products.categories.index', $product)
        );

        $response->assertOk()->assertSee($category->name);
    }

    /**
     * @test
     */
    public function it_can_attach_categories_to_product()
    {
        $product = Product::factory()->create();
        $category = Category::factory()->create();

        $response = $this->postJson(
            route('api.products.categories.store', [$product, $category])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $product
                ->categories()
                ->where('categories.id', $category->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_categories_from_product()
    {
        $product = Product::factory()->create();
        $category = Category::factory()->create();

        $response = $this->deleteJson(
            route('api.products.categories.store', [$product, $category])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $product
                ->categories()
                ->where('categories.id', $category->id)
                ->exists()
        );
    }
}
