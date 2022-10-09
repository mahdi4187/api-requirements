<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\Category;
use App\Http\Filters\Discount;
use App\Http\Filters\Price;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = app(Pipeline::class)
            ->send(Product::query())
            ->through([
                Category::class,
                Price::class,
                Discount::class
            ])
            ->thenReturn()
            ->get();

        return ProductResource::collection($products);
    }
}
