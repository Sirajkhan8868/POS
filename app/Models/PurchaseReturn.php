<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'supplier',
        'date',
        'tax',
        'discount',
        'shipping',
        'total_amount',
        'status'
    ];

    public function items()
    {
        return $this->hasMany(PurchaseReturnItem::class);
    }
}
