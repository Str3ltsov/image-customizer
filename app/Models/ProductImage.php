<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    protected $fillable = [
        'src',
        'product_body_color_id',
        'product_wheel_trim_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'src' => 'string',
        'product_body_color_id' => 'integer',
        'product_wheel_trim_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function bodyColor(): HasOne
    {
        return $this->hasOne(ProductBodyColor::class, 'id', 'product_body_color_id');
    }

    public function wheelTrim(): HasOne
    {
        return $this->hasOne(ProductWheelTrim::class, 'id', 'product_wheel_trim_id');
    }
}
