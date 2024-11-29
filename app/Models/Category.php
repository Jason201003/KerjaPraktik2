<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    // Specify the fillable fields for mass assignment
    protected $fillable = ['name', 'slug'];

    /**
     * Boot method to automatically generate a slug when creating a category.
     */
    protected static function boot()
    {
        parent::boot();

        // Set slug automatically when creating a new category
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });

        static::updating(function($category) {
            $category->slug = Str::slug($category->name);
        });
    }
    
    /**
     * Automatically update the slug when the name is updated.
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
