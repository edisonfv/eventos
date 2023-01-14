<?php
namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;

class ProductCategoriesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Product $product)
    {
        $this->authorize('view', $product);

        $search = $request->get('search', '');

        $categories = $product
            ->categories()
            ->search($search)
            ->latest()
            ->paginate();

        return new CategoryCollection($categories);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        Product $product,
        Category $category
    ) {
        $this->authorize('update', $product);

        $product->categories()->syncWithoutDetaching([$category->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        Product $product,
        Category $category
    ) {
        $this->authorize('update', $product);

        $product->categories()->detach($category);

        return response()->noContent();
    }
}
