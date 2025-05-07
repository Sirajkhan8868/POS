<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockAdjustment extends Model
{
    protected $fillable = ['reference', 'date', 'note'];

    public function items()
    {
        return $this->hasMany(StockAdjustmentItem::class, 'adjustment_id');
    }

}
