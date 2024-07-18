<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'img_thumbnail',
        'price_regular',
        'price_sale',
        'description',
        'content',
        'material',
        'characteristic',
        'use_manual',
        'is_active',
        'is_best_sale',
        'is_40_sale',
        'is_hot',
    ];

    protected $casts = [
        'is_active'=> 'boolean',
        'is_best_sale'=> 'boolean',
        'is_40_sale'=> 'boolean',
        'is_hot'=> 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function varaint()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function gallery()
    {
        return $this->hasMany(ProductGallery::class);
    }


}
