<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name', 'product_code', 'category_id', 'unit_id', 'cost',
        'price', 'quantity', 'alert_quantity', 'tax', 'tax_type', 'note',
    ];

    // Relationship to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship to Unit (assuming you have a Unit model)
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // Hook into saved and deleted events to update product count
    protected static function booted()
    {
        static::saved(function ($product) {
            // Update the product count for the related category after saving
            $product->category->updateProductCount();
        });

        static::deleted(function ($product) {
            // Update the product count for the related category after deleting
            $product->category->updateProductCount();
        });
    }
}
