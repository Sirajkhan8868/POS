<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = [
        'reference',
        'customer_id',
        'date',
        'tax',
        'discount',
        'shipping',
        'grand_amount',
        'status',
        'note',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(QuotationItem::class);
    }

    public function calculateTotalAmount()
    {
        $subtotal = $this->items->sum('subtotal');

        $taxAmount = ($this->tax / 100) * $subtotal;
        $discountAmount = ($this->discount / 100) * $subtotal;
        $shippingAmount = $this->shipping;

        $totalAmount = $subtotal + $taxAmount - $discountAmount + $shippingAmount;

        $this->grand_amount = round($totalAmount, 2);
        $this->save();

        return $this->grand_amount;
    }
}
