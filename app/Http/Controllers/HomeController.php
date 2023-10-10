<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Throwable;

class HomeController extends Controller
{
    public function __construct(private ProductService $productService)
    {
    }

    public function index()
    {
        return view('home.index')
            ->with('product', $this->productService->getProductById(1));
    }

    public function changeProductImage(Request $request)
    {
        try {
            $productImage = $this->productService
                ->getProductImage($request->bodyColor, $request->wheelTrim);

            return response()->json([
                'message' => 'Successfully changed product image.',
                'data' => $productImage->toArray()
            ]);
        } catch (Throwable $throwable) {
            return response()->json(['message' => $throwable->getMessage()], 500);
        }
    }
}
