<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'supplier_id',
        'product_id',
        'date',
        'tax',
        'discount',
        'shipping',
        'total_amount',
        'status'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function items()
    {
        return $this->hasMany(PurchaseItem::class);
    }
}
