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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    protected static function booted()
    {
        static::saved(function ($product) {
            $product->category->updateProductCount();
        });

        static::deleted(function ($product) {
            $product->category->updateProductCount();
        });
    }
}
