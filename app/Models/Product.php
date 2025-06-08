<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'category_id'
    ];

    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
