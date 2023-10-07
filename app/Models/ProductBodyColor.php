<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductBodyColor extends Model
{
    use HasFactory;

    protected $table = 'product_body_colors';

    protected $fillable = [
        'name',
        'image',
        'is_default',
        'product_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'name' => 'string',
        'image' => 'string',
        'is_default' => 'boolean',
        'product_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
