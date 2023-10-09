<?php

namespace App\Services;

use App\Models\Product;
use Exception;

class ProductService
{
    public final function getProductById(int|string $id): object
    {
        $product = Product::find($id);

        if (!$product) {
            throw new Exception('No product found.');
        }

        return $product;
    }
}
