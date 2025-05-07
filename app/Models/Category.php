<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_code', 'category_name', 'product_count'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function updateProductCount()
    {
        $this->product_count = $this->products()->count();
        $this->save();
    }
}
