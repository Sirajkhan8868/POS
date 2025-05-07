<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReturn extends Model
{
    use HasFactory;

    // Fillable properties for mass assignment
    protected $fillable = [
        'reference',
        'supplier_id',
        'date',
        'tax',
        'discount',
        'shipping',
        'total_amount',
        'status'
    ];

    // Define the relationship with the Supplier model
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    // Define the relationship with the PurchaseReturnItem model
    public function items()
    {
        return $this->hasMany(PurchaseReturnItem::class);
    }
}
