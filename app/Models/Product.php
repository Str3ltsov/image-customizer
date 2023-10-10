<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'name' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function bodyColors(): HasMany
    {
        return $this->hasMany(ProductBodyColor::class, 'product_id', 'id');
    }

    public function wheelTrims(): HasMany
    {
        return $this->hasMany(ProductWheelTrim::class, 'product_id', 'id');
    }
}
