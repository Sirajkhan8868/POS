<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'reference',
        'supplier_id',
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

    public function items()
    {
        return $this->hasMany(PurchaseReturnItem::class);
    }
}
