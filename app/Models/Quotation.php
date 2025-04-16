<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = [
        'reference', 'customer', 'date', 'tax', 'discount',
        'shipping', 'total_amount', 'status'
    ];

    public function items()
    {
        return $this->hasMany(QuotationItem::class);
    }
}

