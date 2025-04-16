<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAdjustmentItem extends Model
{
    use HasFactory;

    protected $fillable = ['adjustment_id', 'product_id', 'stock', 'code', 'quantity', 'type'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function adjustment()
    {
        return $this->belongsTo(StockAdjustment::class, 'adjustment_id');
    }
}
