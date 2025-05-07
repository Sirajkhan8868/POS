<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockAdjustmentItem extends Model
{
    protected $fillable = ['adjustment_id', 'product_id', 'stock', 'code', 'quantity', 'type'];

    public function items()
    {
        return $this->hasMany(StockAdjustmentItem::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
