<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductImage;
use Exception;

class ProductService
{
    public function getProductById(int|string $id): object
    {
        $product = Product::find($id);

        if (!$product) {
            throw new Exception('No product found.');
        }

        return $product;
    }

    public function getProductImage(int|string $bodyColorId, int|string $wheelTrimId): object
    {
        $productImage = ProductImage::where([
            ['product_body_color_id', $bodyColorId],
            ['product_wheel_trim_id', $wheelTrimId],
        ])->first();

        if (!$productImage) {
            throw new Exception('No product image found.');
        }

        return $productImage;
    }
}
