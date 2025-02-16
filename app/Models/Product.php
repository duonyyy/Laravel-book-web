<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
    ];

    // Always load these relationships
    protected $with = ['images', 'category'];

    // Relationship with ProductImage
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship with ProductComment, sorted by newest
    public function comments()
    {
        return $this->hasMany(ProductComment::class, 'product_id')->latest();
    }
}
