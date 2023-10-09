<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

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
}
