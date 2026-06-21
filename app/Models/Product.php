<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'title',
        'short_name',
        'description',
        'full_description',
    ];

    /**
     * Get the product's URL.
     */
    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn () => config('app.url') . '/products/' . $this->slug,
        );
    }
}
