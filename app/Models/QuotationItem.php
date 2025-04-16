<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    protected $fillable = [
        'quotation_id', 'product_name', 'stock', 'quantity',
        'net_unit_price', 'discount', 'tax', 'subtotal'
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }
}

