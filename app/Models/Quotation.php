<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'product_id',
        'customer',
        'date',
        'tax',
        'discount',
        'shipping',
        'total_amount',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function customer()
{
    return $this->belongsTo(Customer::class);
}
}
